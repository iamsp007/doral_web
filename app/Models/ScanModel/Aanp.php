<?php

namespace App\Models\ScanModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aanp extends Model
{
    use HasFactory;

    public $connection = 'mysql2';

    protected $table = "american_academy_nurse_prac";

}
