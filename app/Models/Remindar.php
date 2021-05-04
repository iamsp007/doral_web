<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remindar extends Model
{
    use HasFactory;
    protected $table = 'remindar';
    protected $fillable = array('user_id', 'title', 'cat_id', 'sub_cat_id', 'startdate', 'start_end_time', 'notes');

}
