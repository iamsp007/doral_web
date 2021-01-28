<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PatientRequest extends Model
{
    use HasFactory;

    public function detail(){

        return $this->hasOne(User::class,'id','clincial_id');
    }
    public function patientDetail(){

        return $this->hasOne(User::class,'id','user_id')->with('detail');
    }
    public function ccrm(){
        return $this->hasMany(CCMReading::class,'user_id','user_id');
    }
    public function routes(){
        return $this->hasMany(RoadlInformation::class,'patient_requests_id','id')->with('user');
    }
    /**
     * Get Meeting Reasons
     */
    public function meeting()
    {
        return $this->hasOne(VirtualRoom::class, 'appointment_id', 'id');
    }

    public function getSymptomsAttribute($value){
        if ($value){
            $symtoms = SymptomsMaster::whereIn('id',explode(',',$value))->pluck('name');
            if ($symtoms){
                return implode(',',$symtoms->toArray());
            }
            return '-';
        }
        return '-';
    }

    public function getDiesesAttribute($value){
        if ($value){
            $data = DiesesMaster::whereIn('id',explode(',',$value))->pluck('name');
            if ($data){
                return implode(',',$data->toArray());
            }
            return '-';
        }
        return '-';
    }
}
