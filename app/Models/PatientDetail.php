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
        'admission_id',
        'medicaid_number',
        'medicare_number',
        'ssn',
        'alert',
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

    

    public function payer() {
        return $this->hasOne(PatientPlayer::class,'id','payer_id');
    }
    public function patientAddress() {
        return $this->hasOne(PatientAddress::class,'patient_id','id');
    }
    public function PatientEmergency() {
        return $this->hasOne(PatientEmergencyContact::class,'patient_id','id');
    }
    public function getSsnFormatAttribute(){
       return 'xxx-xxx-'.substr($this->ssn, -4);
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
    public function nurses()
    {
        return $this->belongsToMany(
            Nurse::class,
            'patient_nurses',
            'patient_id',
            'nurse_id');
    }

}
