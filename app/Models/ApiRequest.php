<?php

namespace App\Models;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiRequest extends Model
{
    use HasFactory;
/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'company_id',
        'software_id',
        'authentication_field',
        'api_id',
        'search_field',
        'schedule',
        'extra_schedule',
        'status',
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'search_field' => 'array',
        'authentication_field' => 'array',
    ];

    // public function getScheduleAttribute($schedule)
    // {
    //     $extra_schedule = $this->extra_schedule;
    //     $scheduleData = '';
    //     if ($schedule === '1') {
    //         $scheduleData = "dailyAt('24:00')";
    //     } else if ($schedule === '2') {
    //         // $extra_schedule = strtoupper($extra_schedule);
    //         // $scheduleData = 'days([Schedule::'.$extra_schedule.', Schedule::'.$extra_schedule.'],"24:00")';
    //         $scheduleData = "everyMinute";
    //     } else if ($schedule === '3') {
    //         $scheduleData = 'twiceMonthly('.$extra_schedule.',"24:00")';
    //     } else if ($schedule === '4') {
    //         $scheduleData = 'quarterly()';
    //     }

    //     return $scheduleData;
    // }

    public function api()
    {
        return $this->hasOne(Api::class, 'id', 'api_id');
    }
}
