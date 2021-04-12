<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Api extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'field',
        'software_id',
        'status'
    ];

    /**
     * The attributes that are casted.
     *
     * @var array
     */
    protected $casts = [
        'field' => 'array',
    ];

    public function software()
    {
        return $this->hasOne(Software::class, 'id', 'software_id');
    }
    public static function getApi()
    {
        return Api::select('id','name')->get();
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
