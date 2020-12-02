<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientRequest extends Model
{
    use HasFactory;
    protected $table='patient_requests';
    protected $primaryKey='id';

    public function patientDetail(){

        return $this->hasOne(User::class,'id','user_id');
    }

    public function ccrm(){
        return $this->hasOne(CCRMReading::class,'user_id','user_id');
    }
}
