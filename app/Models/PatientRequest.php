<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class PatientRequest extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'clincial_id',
        'test_name',
        'type_id',
        'status',
    ];


    public function detail(){

        return $this->hasOne(User::class,'id','clincial_id');
    }

    public function patient(){

        return $this->belongsTo(User::class,'user_id','id');
    }
    public function patient_detail(){

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

    /**
     * Get Meeting Reasons
     */
    public function requests()
    {
        return $this->hasMany(PatientRequest::class, 'parent_id', 'parent_id')->orderBy('id','desc')->with(['requestType','detail']);
    }
    /**
     * Get Meeting Reasons
     */
    public function requestType()
    {
        return $this->hasOne(Referral::class, 'role_id', 'type_id')->select('id','role_id','name','color','icon');
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

     /**
     * Create full name with combine first name and last name
     */
    public function getStatusDataAttribute()
    {
        if ($this->status === '1') {
            $statusData = '<p class="text-primary">Active</p>';
        } else if ($this->status === '2') {
            $statusData = '<p class="text-secondary">Accept</p>';
        } else if ($this->status === '3') {
            $statusData = '<p class="text-info">Arrive</p>';
        } else if ($this->status === '4') {
            $statusData = '<p class="text-success">Complete</p>';
        } else if ($this->status === '5') {
            $statusData = '<p class="text-danger">Cancel</p>';
        } else if ($this->status === '6') {
            $statusData = '<p class="text-warning">Prepare</p>';
        } else if ($this->status === '7') {
            $statusData = '<p class="text-dark">Start</p>';
        }

        return $statusData;
    }
}