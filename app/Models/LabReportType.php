<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabReportType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'sequence', 'status', 'parent_id',
    ];

    public function children()
    {
      return $this->hasMany('App\LabReportType', 'parent_id');
    }

    public function patientLabReport() {
      return $this->hasOne(PatientLabReport::class,'lab_report_type_id','id');
    }

}
