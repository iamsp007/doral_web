<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientCoordinator extends Model
{
    use HasFactory;
    protected $table='patient_coordinators';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id', 'coordinator_id', 
    ];
}
