<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caregivers extends Model
{
    use HasFactory;

    protected $table='caregivers';

    protected $fillable = [
        'patient_id', 'name', 'phone', 'start_time', 'end_time'
    ];
}
