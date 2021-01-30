<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\ReferralWelcomeMail;
use App\Models\Company;
use App\Models\Partner;
use App\Models\Referral;
use App\Models\Role;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class ReferralRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        return view('auth.referral-register');
    }
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showPartnerRegistrationForm()
    {
        return view('auth.partner-register');
    }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::REFERRAL_LOGIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:referral');
        $this->middleware('guest:partner');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();
        $request->merge([
            'name' => $request->company,
            'password' => env('REFERRAL_PASSWORD'),
            'href' => route('login'),
            'email' => $request->email
        ]);
        event(new Registered($user = $this->create($request->all())));
        $details = [
            'name' => $request->company,
            'password' => env('REFERRAL_PASSWORD'),
            'href' => route('login'),
            'email' => $request->email
        ];
        try {
            \Mail::to($request->email)->send(new ReferralWelcomeMail($details));
        }catch (\Exception $exception){
            \Log::info($exception->getMessage());
        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath())->with('success','Company Registration Successfully!');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function partnerRegister(Request $request)
    {
        $this->redirectTo = RouteServiceProvider::PARTNER_LOGIN;

        $this->partnerValidator($request->all())->validate();

        $request->merge([
            'password'=>env('PARTNER_PASSWORD'),
            'type'=>'admin',
            'name'=>$request->company
        ]);
        event(new Registered($user = $this->createPartner($request->all())));
        $details = [
            'name' => $request->company,
            'password' => env('PARTNER_PASSWORD'),
            'href' => route('partner.login'),
            'email' => $request->email
        ];
        try {
            \Mail::to($request->email)->send(new ReferralWelcomeMail($details));
        }catch (\Exception $exception){
            \Log::info($exception->getMessage());
        }

        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath())->with('success','Partner Registration Successfully!');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'referralType' => ['required'],
            'company' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies']
        ]);
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function partnerValidator(array $data)
    {
        return Validator::make($data, [
            'referralType' => ['required'],
            'company' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:companies'],
            'mobile' => ['required', 'regex:/[0-9]{9}/']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $company = new Company();
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->referal_id = $data['referralType'];
        $company->password = Hash::make($data['password']);
        $company->assignRole('referral')->syncPermissions(Permission::all());
        return $company->save();
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createPartner(array $data)
    {
        $company = new Partner();
        $company->name = $data['name'];
        $company->email = $data['email'];
        $company->phone = $data['mobile'];
        $company->referal_id = $data['referralType'];
        $company->password = Hash::make($data['password']);
        $role_name = Referral::where(['id'=>$data['referralType']])->first();
        if ($role_name){
            $company->assignRole($role_name->name);
        }else{
            $company->assignRole('admin');
        }
        return $company->save();
    }
}
