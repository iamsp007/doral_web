<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDevice extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'device_id',
        'device_type',
        'status',
    ];

    /**
     * Relation with user
     */
    public function demographic()
    {
        return $this->belongsTo('App\Models\Demographic', 'user_id', 'user_id');
    }

    /**
     * Relation with user
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'patient_id', 'id');
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getViewDeviceTypeAttribute()
    {
        $statusData = '';
        if ($this->device_type === '1') {
            $statusData = '<p class="text-success">Blood Pressure</p>';
        } else if ($this->device_type === '2') {
            $statusData = '<p class="text-primary">Glucometer</p>';
        } else if ($this->device_type === '3') {
            $statusData = '<p class="text-secondary">Digital Weight Machine</p>';
        } else if ($this->device_type === '4') {
            $statusData = '<p class="text-primary">Pulse oxymeter</p>';
        }

        return $statusData;
    }
}
