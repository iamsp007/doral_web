<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Activitylog\Traits\LogsActivity;

class Company extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles, LogsActivity;
    

    protected $guard = 'referral';

    protected $table='companies';
    protected $primaryKey='id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected static $logAttributes = [
        'name', 'dob', 'phone', 'email', 'email_verified', 'status', 'remember_token', 'level', 'api_token','referal_id',
    ];

    public function getDescriptionForEvent(string $eventName): string
    {
        return "You have {$eventName} referral";
    }

    protected static $logName = 'Referral';

    protected static $logOnlyDirty = true;

    protected static $submitEmptyLogs = false;


    protected $fillable = [
        'name', 'dob', 'phone', 'email', 'email_verified', 'password', 'status', 'remember_token', 'level', 'api_token','referal_id',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getExpirationDateAttribute($date)
    {
        $dateData = '';
        if ($date) {
            $dateData = date('m-d-Y', strtotime($date));
        }
        return $dateData;
    }

    public function getAdministratorOhoneNoAttribute($phone)
    {
        $phoneData = '';
        if ($phone) {
            $phoneData = "+".substr($phone, 0, 1). " (".substr($phone, 1, 3).") ".substr($phone, 4, 3)."-".substr($phone,7);
        }
        return $phoneData;
    }
    
}
