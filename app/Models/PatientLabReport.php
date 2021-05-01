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
        'user_id',
        'due_date',
        'perform_date',
        'expiry_date',
        'type',
        'result',
        'note',
    ];

    // protected $appends = ['result'];

    public function labReportType() {
        return $this->hasOne(LabReportType::class,'id','lab_report_type_id');
    }

    public function user() {
        return $this->hasOne(User::class,'id','user_id');
    }

    public function getResultAttribute($result)
    {
        return ucfirst($result);
    }

    public function getDueDateAttribute($date)
    {
        $dateData = '';
        if ($date) {
            $dateData = date('m-d-Y', strtotime($date));
        }
        return $dateData;
    }

    public function getPerformDateAttribute($date)
    {
        $dateData = '';
        if ($date) {
            $dateData = date('m-d-Y', strtotime($date));
        }
        return $dateData;
    }

    public function getExpiryDateAttribute($date)
    {
        $dateData = '';
        if ($date) {
            $dateData = date('m-d-Y', strtotime($date));
        }
        return $dateData;
    }
}
