<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Partner extends Authenticatable
{
    use HasFactory,Notifiable,HasRoles;

    protected $guard = 'partner';

    protected $table='users';
    protected $primaryKey='id';

    protected $fillable = [
        'first_name', 'last_name', 'dob', 'phone', 'email', 'designation_id', 'password', 'status', 'remember_token', 'level', 'api_token'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];


    protected $appends = ['name'];
    
    public function getMorphClass()
    {
        return 'users';
    }

    /**
     * Create full name with combine first name and last name
     */
    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
}
