<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorDetail extends Model
{
    use HasFactory;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'visitor_id',
        'visit_date',
        'caregiver_id',
        'first_name',
        'last_name',
        'caregiver_code',
        'time_attendance_PIN',
        'schedule_start_time',
        'schedule_end_time',
    ];

    public function getFullNameAttribute(){
        return $this->first_name . ' ' . $this->last_name;
     }
}
