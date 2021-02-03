<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientLabReport extends Model
{

    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'lab_report_type_id',
        'patient_referral_id',
        'due_date',
        'perform_date',
        'expiry_date',
        'type',
        'result',
        'x_ray_due_date',
        'x_ray_expiry_date',
        'x_ray_result',
    ];

    public function labReportType() {
        return $this->hasOne(LabReportType::class,'id','lab_report_type_id');
    }

    public function getLabResultAttribute()
    {
        $result = 'Positive';
        if ($this->result === '0') {
            $result = 'Negative';
        } 

        return $result;
    }
}
