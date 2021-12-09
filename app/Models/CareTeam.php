<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class CareTeam extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static $logAttributes = [
        'patient_id', 'detail',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} CareTeam";
    }

    protected static $logName = 'CareTeam';

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;

    protected $fillable = [
        'patient_id', 'detail',
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'detail' => 'array',
    ];

    public function user()
    {
        return $this->hasOne(User::class,'id','patient_id');
    }
}
