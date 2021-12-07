<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Jobs\SendEmailJob;
use App\Models\Company;
use App\Models\Designation;
use App\Models\Partner;
use App\Models\Referral;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use App\Helpers\Helper;

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
        $referrals = Referral::where('guard_name','=','referral')->get();
       
        return view('auth.referral-register',compact('referrals'));
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
        $helper = new Helper();
        $to = "eaPYO9xjyqE:APA91bHu5SqlOBB3keVhnS-4ZSnkHMRMuZvHkaid7bS5MsxNJcj1WYy-JWU17V3moGRDczPyjVsjYOSTRfxMSvNE8zYOF_vGiNIh3o53bf0i-GDSkiK895ZveHJR64iKAQb8__R6SH2K";
        $data = array("body"=>"Demo Test Message 111");
        $helper->sendSpecialNotification($to,$data);
        
        $this->validator($request->all())->validate();
        // $passwordString = strtolower($request->company) . '@referral';
        // $password = str_replace(' ', '-', $passwordString);
        $request->merge([
            'name' => $request->company,
            'password' => env('REFERRAL_PASSWORD'),
            'href' => route('login'),
            'email' => $request->email
        ]);
        event(new Registered($user = $this->create($request->all())));
        
        $url = route('companyEmailVerified', base64_encode($user->id));
        $details = [
            'name' => $request->company,
            'href' => $url,
        ];
    
        SendEmailJob::dispatch($request->email,$details,'WelcomeEmail');
        if ($response = $this->registered($request, $user)) {
            return $response;
        }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath())->with('success','Your account has been successfully registered. Check your email for further processing.');
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

        $password = Str::random(8);
        $request->merge([
            'password' => $password,
            'type' => $request->referralType,
            'name' => $request->company
        ]);
       
        event(new Registered($user = $this->createPartner($request->all())));

        $designation = new Designation();
        $designation->name = 'Field Visitor';
        $designation->role_id = $request->referralType;
        $designation->user_id = $user->id;
        $designation->save();

        $url = route('partnerEmailVerified', base64_encode($user->id));
        $details = [
            'name' => $request->company,
            'href' => $url,
        ];
    
        SendEmailJob::dispatch($request->email,$details,'WelcomeEmail');
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
            'email' => ['required', 'email', 'unique:users'],
            'phone' => ['required', 'regex:/[0-9]{9}/']
        ],[
            'referralType.required' => 'Please select partner type.',
            'company.required' => 'Please enter company name.',
            'email.required' => 'Please enter email.',
            'email.email' => 'Please enter valid email.',
            'phone.required'  => 'Please enter phone.',
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
        $company->assignRole('referral');
        $company->save();
        return $company;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function createPartner(array $data)
    {
        $partner = new Partner();
        $input['first_name'] = $data['name'];
        $input['email'] = $data['email'];
        $input['phone'] = $data['phone'];
        $input['password'] = setPassword($data['password']);
      
        $partner->fill($input)->save();

        $partner->assignRole($data['type']);
          
        DB::table('model_has_roles')->insert([
            'role_id' => $data['type'],
            'model_type' => User::class,
            'model_id' => $partner->id,
        ]);

        return $partner;
    }
}
