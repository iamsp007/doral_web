<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Icd extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'icd_code_id',
        'date',
        'date_type',
        'historical_date',
        'identified_during',
        'primary',
    ];
    
    public function icdCode(){
        return $this->hasOne(IcdCode::class,'id','icd_code_id');
    }

    public function patient(){
        return $this->hasOne(User::class,'id','patient_id');
    }

    public function diagnosis(){
        return $this->hasMany(UserDevice::class,'diagnosis_id','id');
    }
}
