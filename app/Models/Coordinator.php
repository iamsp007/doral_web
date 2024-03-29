<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coordinator extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'coordinator_id', 
    ];

    
    /**
     * The roles that belong to the user.
     */
    public function patientCoordinator()
    {
        return $this->belongsToMany(PatientCoordinator::class);
    }
}
