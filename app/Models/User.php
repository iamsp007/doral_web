<?php

namespace App\Models;

use Carbon\Carbon;
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
        'first_name', 'last_name', 'dob', 'phone', 'email', 'email_verified_at', 'password', 'status', 'remember_token', 'level', 'api_token', 'designation_id', 'gender',
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
    protected $appends = ['profile_photo_url', 'gender_name', 'gender_data','avatar_image', 'phone_format', 'full_name', 'age'];

    public function designation()
    {
        return $this->hasOne(Designation::class,'id','designation_id');
    }

    public function patientDetail()
    {
        return $this->hasOne(PatientReferral::class,'user_id','id')->with(['service','filetype']);
    }
    
    public function employee()
    {
        return $this->hasOne(Employee::class,'user_id','id');
    }

    public function demographic()
    {
        return $this->hasOne(Demographic::class,'user_id','id');
    }

    public function caseManagement()
    {
        return $this->hasOne(CaseManagement::class,'patient_id','id');
    }

    public function patientLabReport()
    {
        return $this->hasMany(PatientLabReport::class,'user_id','id');
    }

    public function userDevices()
    {
        return $this->hasMany(UserDevice::class,'patient_id','id');
    }

    
    public function careTeam()
    {
        return $this->hasMany(CareTeam::class,'patient_id','id');
    }

    public function patientRequest()
    {
        return $this->hasMany(PatientRequest::class,'user_id','id');
    }

    public function clinicianRequest()
    {
        return $this->hasMany(PatientRequest::class,'clincial_id','id');
    }

    public function patientReport()
    {
        return $this->hasMany(PatientReport::class,'user_id','id');
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    
    /**
     * applicant
     */
    public function applicant()
    {
        return $this->hasOne(Applicant::class, 'user_id', 'id');
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getStatusDataAttribute()
    {
        if ($this->status === '0') {
            $statusData = '<p class="text-primary">Pending</p>';
        } else if ($this->status === '1') {
            $statusData = '<p class="text-success">Active</p>';
        } else if ($this->status === '2') {
            $statusData = '<p class="text-secondary">Inactive</p>';
        } else if ($this->status === '3') {
            $statusData = '<p class="text-danger">Reject</p>';
        } else if ($this->status === '4') {
            $statusData = '<p class="text-info">Initial</p>';
        } else if ($this->status === '5') {
            $statusData = '<p class="text-info">Completed</p>';
        }
        return $statusData;
    }

    public function patientEmergency()
    {
        return $this->hasMany(PatientEmergencyContact::class,'user_id','id');
    }

    // /**
    //  * Get gender value and set label according to gender value
    //  */
    // public function setGenderAttribute($gender)
    // {
    //     if ($gender === 'Male' || $gender === 'MALE' || $gender === '1') {
    //         $gender = '1';
    //     } else if ($gender === 'Female' || $gender === 'FEMALE' || $gender === '2') {
    //         $gender = '2';
    //     } else {
    //         $gender = '3';
    //     }
       
    //     return $gender;
    // }

    /**
     * Get gender value and set label according to gender value
     */
    public function getGenderDataAttribute()
    {
        if ($this->gender === '1') {
            $gender = 'Male';
        } else if ($this->gender === '2') {
            $gender = 'Female';
        } else {
            $gender = 'Other';
        }
        return $gender;
    }

    public function getPhoneAttribute($phone)
    {
        $phoneData = '';
        if ($phone) {
            $phoneData = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)."-".substr($phone,6);
        }
        return $phoneData;
    }

    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getGenderNameAttribute()
    {
        return $this->gender==='1'?'Male':($this->gender==='2'?'Female':'Other');
    }
    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getAvatarImageAttribute()
    {
       if (isset($this->avatar) && !empty($this->avatar)) {
            return env('WEB_URL').'/upload/images/'.$this->avatar;
        } else {
            return env('APP_URL').'assets/img/user/avatar.jpg';
        }
    }

    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getDobAttribute($value)
    {
        return Carbon::parse(strtotime($value))->format('m/d/Y');
    }

    /**
     * Get the user's Date Of Birth.
     *
     * @return string
     */
    public function getPhoneFormatAttribute()
    {
        $value=$this->phone;
        if ($value){
            $cleaned = preg_replace('/[^[:digit:]]/', '', $value);
            preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
            if($matches){
                return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
            }
        }
        return $value;
    }

    public function getAgeAttribute()
    {
        $year = Carbon::parse($this->dob)->age;

        $age = '';
        if ($year >= 18) {
            $age = 'Yes';
        } else {
            $age = 'No';
        }

        return $age;
    }
    public function detail(){
        return $this->hasOne(PatientReferral::class,'user_id','id')->with('service');
    }
    
      /**
     * education
     */
    public function education()
    {
        return $this->hasOne(Education::class, 'user_id', 'id');
    }
    
    /**
     * professional
     */
    public function professional()
    {
        return $this->hasOne(Certificate::class, 'user_id', 'id');
    }
    
     /**
     * attestation
     */
    public function attestation()
    {
        return $this->hasMany(Attestation::class, 'user_id', 'id');
    }
    
    /**
     * background
     */
    public function background()
    {
        return $this->hasMany(WorkHistory::class, 'user_id', 'id');
    }
    
     /**
     * deposit
     */
    public function deposit()
    {
        return $this->hasOne(BankAccount::class, 'user_id', 'id');
    }

 /**
     * documents
     */
    public function documents()
    {
        return $this->hasMany(UploadDocuments::class, 'user_id', 'id');
    }
    
   
}
