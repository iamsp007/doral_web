<?php

namespace App\Models\ScanModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfMisconduct extends Model
{
    use HasFactory;

    public $connection = 'mysql2';

    protected $table = "prof_misconducts";
}
