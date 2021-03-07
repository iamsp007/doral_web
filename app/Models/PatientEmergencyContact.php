<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatientEmergencyContact extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'relation',
        'lives_with_patient',
        'have_keys',
        'phone1',
        'phone2',
        'address',
    ];
    
    public function getPhone1Attribute($phone)
    {
        $phoneData = '';
        if ($phone) {
            $phoneData = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)." ".substr($phone,6);
        }
        return $phoneData;
    }

    public function getPhone2Attribute($phone)
    {
        $phoneData = '';
        if ($phone) {
            $phoneData = "(".substr($phone, 0, 3).") ".substr($phone, 3, 3)." ".substr($phone,6);
        }
        return $phoneData;
    }
}
