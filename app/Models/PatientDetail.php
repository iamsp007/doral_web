<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientDetail extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doral_id',
        'agency_id',
        'office_id',
        'patient_id',
        'first_name',
        'middle_name',
        'last_name',
        'birth_date',
        'gender',
        'priority_code',
        'service_request_start_date',
        'nurse_id',
        'nurse_name',
        'admission_id',
        'medicaid_number',
        'medicare_number',
        'ssn',
        'alert',
        'source_admission_id',
        'source_admission_name',
        'team_id',
        'team_name',
        'location_id',
        'location_name',
        'branch_id',
        'branch_name',
        'home_phone',
        'phone2',
        'phone2_description',
        'phone3',
        'phone3_description',
        'home_phone_location_address_id',
        'home_phone_location_address',
        'home_phone2_location_address_id',
        'home_phone2_location_address',
        'home_phone3_location_address_id',
        'home_phone3_location_address',
        'direction',
        'payer_id',
        'payer_name',
        'payer_coordinator_id',
        'payer_coordinator_name',
        'patient_status_id',
        'patient_status_name',
        'wage_parity',
        'wage_parity_from_date1',
        'wage_parity_to_date1',
        'wage_parity_from_date2',
        'wage_parity_to_date2',
        'primary_language_id',
        'primary_language',
        'secondary_language_id',
        'secondary_language',
    ];

    public function patientAddress() {
        return $this->hasOne(PatientAddress::class,'patient_id','id');
    }

    public function alternateBilling() {
        return $this->hasOne(AlternateBilling::class,'patient_id','id');
    }

    
    public function PatientEmergency() {
        return $this->hasOne(PatientEmergencyContact::class,'patient_id','id');
    }

    /**
     * Relation with referances
     */
    public function patientEmergencyContact()
    {
        return $this->hasMany('App\Models\PatientEmergencyContact', 'patient_id', 'id');
    }

    /**
     * Relation with referances
     */
    public function coordinators()
    {
        return $this->belongsToMany(
            Coordinator::class,
            'patient_coordinators',
            'patient_id',
            'coordinator_id');
    }

    /**
     * Relation with referances
     */
    public function acceptedServices()
    {
        return $this->belongsToMany(
            AcceptedService::class,
            'patient_accepted_services',
            'patient_id',
            'accepted_service_id');
    }

    /**
     * Relation with nurse
     */
    public function emergencyPreparedness()
    {
        return $this->hasOne(EmergencyPreparedness::class,'patient_id','id');
    }
  
    public function visitorDetail() {
        return $this->hasOne(VisitorDetail::class,'patient_id','id')->orderBy('id','DESC');
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    /**
     * Get gender value and set label according to gender value
     */
    public function setGenderAttribute($gender)
    {
        if ($gender == 'Male') {
            $gender = '1';
        } else if ($gender == 'Female') {
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
        } else if ($gender === 'MALE') {
            $gender = 'Male';
        } else if ($gender === 'FEMALE') {
            $gender = 'Female';
        } else {
            $gender = 'Other';
        }
        return $gender;
    }

    /**
     * Create ssn number
     */
    public function getSsnAttribute($ssn)
    {
        $ssnData = '';

        if ($ssn) {
            return 'xxx-xx-' . substr($ssn, -4);
        }

        return $ssnData;
    }

    /**
     * Relation with referances
     */
    public function medicines()
    {
        return $this->hasMany('App\Models\Medicine', 'patient_id', 'id');
    }

    /**
     * Relation with referances
     */
    public function patientClinicalDetail()
    {
        return $this->hasOne('App\Models\PatientClinicalDetail', 'patient_id', 'id');
    }
}
