<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientAddress extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'patient_id',
        'address_id',
        'address1',
        'address2',
        'cross_street',
        'city_id',
        'zip5',
        'zip4',
        'state_id',
        'county_id',
        'is_primary_address',
        'addresstypes',
    ];
}
