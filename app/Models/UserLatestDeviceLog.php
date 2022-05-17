<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserLatestDeviceLog extends Model
{
    use HasFactory;

    protected $table = 'user_latest_device_logs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_device_id',
        'patient_id',
        'value',
        'reading_time',
        'level',
        'status',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['view_level', 'view_reading_date','date_format'];

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
    public function getViewReadingDateAttribute()
    {
        return  date('m/d/Y', strtotime($this->reading_time));
    }
 
    /**
     * Create full name with combine first name and last name
     */
    public function getDateFormatAttribute()
    {
        return dateFormat($this->reading_time);
    }
}
