<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demographic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doral_id',
        'user_id',
        'service_id',
        'company_id',
        'patient_id',
        'ssn',
        'medicaid_number',
        'medicare_number',
        'accepted_services',
        'address',
        'language',
        'ethnicity',
        'country_of_birth',
        'employee_type',
        'marital_status',
        'status',
        'notification_preferences',
        'type',
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'accepted_services' => 'array',
        'address' => 'array',
        'notification_preferences' => 'array',
    ];

    // /**
    //  * Create ssn number
    //  */
    // public function getTypeAttribute($type)
    // {
    //     if ($type === '1') {
    //         $typeData = 'Patient';
    //     } else if ($type === '2') {
    //         $typeData = 'Caregiver';
    //     } else {
    //         $typeData = '';
    //     }
    //     return $typeData;
    // }

    // /**
    //  * Create ssn number
    //  */
    // public function getSsnAttribute($ssn)
    // {
    //     $ssnData = '';

    //     if ($ssn) {
    //         return 'xxx-xx-' . substr($ssn, -4);
    //     }

    //     return $ssnData;
    // }

    // public function getTelephoneAttribute()
    // {
    //     $phoneData = '';
    //     if ($this->address) {
    //         $address = json_decode($this->address);
    //         if ($address && $address->Phone2) {
    //             $phone2 = str_replace("-","",$address->Phone2);
    //             $phoneData = "(".substr($phone2, 0, 3).") ".substr($phone2, 3, 3)."-".substr($phone2,6);
    //         }
    //     }
    //     return $phoneData;
    // }
} 
