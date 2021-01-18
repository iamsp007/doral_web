<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class CaseManagement extends Model
{
    use HasFactory,Notifiable,HasRoles;

    protected $guard = 'supervisor';

    protected $table='case_management';
    protected $primaryKey='id';

    protected $fillable=['patient_id','clinician_id'];

}
