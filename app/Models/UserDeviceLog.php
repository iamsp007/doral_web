<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDeviceLog extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_device_id',
        'value',
        'reading_time',
        'level',
        'status',
        'note'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['view_date'];

    /**
     * Relation with user
     */
    public function userDevice()
    {
        return $this->belongsTo('App\Models\UserDevice', 'user_device_id', 'id');
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getViewLevelAttribute()
    {
        $statusData = '';
        if ($this->level === '1') {
            $statusData = '<p class="text-success">Level 1</p>';
        } else if ($this->level === '2') {
            $statusData = '<p class="text-primary">Level 2</p>';
        } else if ($this->level === '3') {
            $statusData = '<p class="text-danger">Level 3</p>';
        } 

        return $statusData;
    }
    
      /**
     * Create full name with combine first name and last name
     */
    public function getViewDateAttribute()
    {
        return dateFormat($this->created_at);
    }
}
