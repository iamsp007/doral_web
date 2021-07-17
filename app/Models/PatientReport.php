<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientReport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'file_name',
        'original_file_name',
        'user_id',
        'lab_report_type_id',
    ];

    public function labReports(){
        return $this->hasOne(LabReportType::class,'id','lab_report_type_id');
    }
}
