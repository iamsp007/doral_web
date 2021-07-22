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
        'is_missed_visit',
        'patient_detail',
        'caregiver_detail',
        'schedule_time_detail',
        'ttot_detail',
        'verification_detail',
        'timesheet_detail',
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'patient_detail' => 'array',
        'caregiver_detail' => 'array',
        'schedule_time_detail' => 'array',
        'ttot_detail' => 'array',
        'verification_detail' => 'array',
        'timesheet_detail' => 'array',
    ];
}
