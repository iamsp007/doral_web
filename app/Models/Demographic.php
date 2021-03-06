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

    /**
     * Create ssn number
     */
    public function getTypeAttribute($type)
    {
        if ($type === '1') {
            $typeData = 'Patient';
        } else if ($type === '2') {
            $typeData = 'Caregiver';
        } else {
            $typeData = '';
        }
        return $typeData;
    }

    /**
     * Create ssn number
     */
    public function getSsnAttribute($ssn)
    {
        $ssnData = '';

        if ($ssn) {
            return 'xxx-xx-' . substr($ssn, -4);
        }

        return $ssnData;
    }

    public function getTelephoneAttribute()
    {
        $phoneData = '';
        if ($this->address) {
            $address = json_decode($this->address);
            if ($address[0] && $address[0]->Phone2) {
                $phoneData = "(".substr($address[0]->Phone2, 0, 3).") ".substr($address[0]->Phone2, 3, 3)." ".substr($address[0]->Phone2,6);
            }
        }
        return $phoneData;
    }
} 
