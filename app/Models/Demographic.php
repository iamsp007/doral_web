<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demographic extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doral_id',
        'user_id',
        'ssn',
        'team',
        'location',
        'branch',
        'accepted_services',
        'address',
        'language',
        'type',
    ];
}
