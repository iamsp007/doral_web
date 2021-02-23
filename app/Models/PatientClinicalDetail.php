<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientClinicalDetail extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'nursing_visits_due',
        'md_order_required',
        'md_order_due',
        'md_visit_due',
    ];

     /**
     * Get gender value and set label according to gender value
     */
    public function getMdOrder_requiredAttribute($MDOrderRequired)
    {
        if ($MDOrderRequired === '0') {
            $MDOrderRequiredValue = 'No';
        } else if ($MDOrderRequired === '1') {
            $MDOrderRequiredValue = 'Yes';
        }
        return $MDOrderRequiredValue;
    }
    
    /**
     * Relation with referances
     */
    public function patientAllergy()
    {
        return $this->hasMany('App\Models\PatientAllergy', 'patient_clinical_detail_id', 'id');
    }

}
