<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\Log;

class EmailVerifyController extends Controller
{
    public function emailVerified($user_id)
    {
        try {
            $userId = base64_decode($user_id);
            
            $company = Company::find($userId);
            if ($company) {
                $company->email_verified = '1';
                $company->save();
            }
            
            return redirect(route('login'));
        } catch (\Exception $exception){
            Log::info($exception->getMessage());
        }
    }
}
