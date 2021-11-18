<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class CareTeam extends Model
{
    use HasFactory, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static $logAttributes = [
        'patient_id', 'family_detail', 'physician_detail', 'pharmacy_detail',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} CareTeam";
    }

    protected static $logName = 'CareTeam';

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $fillable = [
        'patient_id', 'family_detail', 'physician_detail', 'pharmacy_detail',
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'family_detail' => 'array',
        'physician_detail' => 'array',
        'pharmacy_detail' => 'array',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','patient_id');
    }
}
