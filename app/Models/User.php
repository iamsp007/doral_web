<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'dob', 'phone', 'email', 'email_verified_at', 'password', 'status', 'remember_token', 'level', 'api_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

//    protected $dateFormat='m/d/Y';
//
//    protected $dates = [ 'created_at', 'updated_at'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function patientDetail()
    {
        return $this->hasOne(PatientReferral::class,'user_id','id')->with(['service','filetype']);
    }

    public function caregiverInfo()
    {
        return $this->hasOne(CaregiverInfo::class,'user_id','id');
    }

    public function demographic()
    {
        return $this->hasOne(Demographic::class,'user_id','id');
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function patientEmergency()
    {
        return $this->hasMany(PatientEmergencyContact::class,'user_id','id');
    }

    /**
     * Get gender value and set label according to gender value
     */
    public function setGenderAttribute($gender)
    {
        if ($gender === 'Male') {
            $gender = '1';
        } else if ($gender === 'Female') {
            $gender = '2';
        } else {
            $gender = '3';
        }
        return $gender;
    }

    /**
     * Get gender value and set label according to gender value
     */
    public function getGenderAttribute($gender)
    {
        if ($gender === '1') {
            $gender = 'Male';
        } else if ($gender === '2') {
            $gender = 'Female';
        } else {
            $gender = 'Other';
        }
        return $gender;
    }
}

