<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CCRMReading extends Model
{
    use HasFactory;
    protected $table='c_c_m_readings';
    protected $primaryKey='id';
}
