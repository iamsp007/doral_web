<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Software extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'authentication_field',
        'status',
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'authentication_field' => 'array',
    ];

    public static function getSoftware()
    {
        return Software::select('id','name')->get();
    }

    public function getStatusViewAttribute()
    {
        $status = '';
        if ($this->status === '1') {
            $status = 'Active';
        } else if ($this->status === '0') {
            $status = 'InActive';
        }

        return $status;
    }
}
