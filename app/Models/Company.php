<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;


class Company extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles;

    protected $guard = 'referral';

    protected $table='companies';
    protected $primaryKey='id';

    protected $fillable = [
        'first_name', 'last_name', 'dob', 'phone', 'email', 'email_verified_at', 'password', 'status', 'remember_token', 'level', 'api_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $appends = ['name'];


    /**
     * Create full name with combine first name and last name
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    // public function getPhoneAttribute($phone)
    // {
    //     $phoneData = '';
    //     if ($phone) {
    //         $phoneData = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
    //     }
    //     return $phoneData;
    // }

    public function getExpirationDateAttribute($date)
    {
        $dateData = '';
        if ($date) {
            $dateData = date('m-d-Y', strtotime($date));
        }
        return $dateData;
    }

    // public function getAdministratorPhoneNoAttribute($phone)
    // {
    //     $phoneData = '';
    //     if ($phone) {
    //         $phoneData = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
    //     }
    //     return $phoneData;
    // }
}
