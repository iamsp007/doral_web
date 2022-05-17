<?php

namespace App\Models\ScanModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Everify extends Model
{
    use HasFactory;

    public $connection = 'mysql2';

    protected $table = "everify_details";
}
