<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientReferralInfo extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'referral_master_id',
        'referral_created_date',
        'referral_name',
        'referral_received_date',
        'referral_status_id',
        'referral_status',
        'referral_commission_status_id',
        'referral_commission_status',
        'referral_source_id',
        'referral_source_name',
        'referral_source_type',
        'referral_contact_id',
        'referral_contact_name',
        'referral_intake_person_id',
        'referral_intake_person_name',
        'referral_account_manager_id',
        'referral_account_manager_name',
    ];
}
