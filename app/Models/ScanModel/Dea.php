<?php

namespace App\Models\ScanModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dea extends Model
{
    use HasFactory;

    public $connection = 'mysql2';

    protected $table = "scrap_deadiversion_user_detail";
}
