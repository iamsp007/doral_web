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
        'medica_id_number',
        'medicare_number',
        'ssn',
        'payer_id',
    ];

    

    public function payer() {
        return $this->hasOne(PatientPlayer::class,'id','payer_id');
    }
}
