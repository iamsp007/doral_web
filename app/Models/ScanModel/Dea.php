<?php

namespace App\Models\ScanModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dea extends Model
{
    use HasFactory;

    public $connection = 'mysql2';

    protected $table = "scrap_deadiversion_user_detail";

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'created_at',
        'dea_no',
        'name',
        'business_activity',
    ];
}
