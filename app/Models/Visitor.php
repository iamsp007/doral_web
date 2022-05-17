<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'visitor_id',
        'visit_date',
        'patient_id',
        'patient_admission_number',
        'caregiver_id',
        'caregiver_code',
    ];
}
