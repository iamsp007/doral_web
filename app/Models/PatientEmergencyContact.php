<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientEmergencyContact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'name',
        'relationship_id',
        'relationship_name',
        'lives_with_patient',
        'have_keys',
        'phone1',
        'phone2',
        'address',
    ];
}
