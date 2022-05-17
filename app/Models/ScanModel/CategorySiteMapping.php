<?php

namespace App\Models\ScanModel;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategorySiteMapping extends Model
{
    use HasFactory;

    public $connection = 'mysql2';

    protected $table = "cat_site_mapping";

    public function siteInfo()
    {
        return $this->hasOne(SiteInfo::class,'id','site_id');
    }
}
