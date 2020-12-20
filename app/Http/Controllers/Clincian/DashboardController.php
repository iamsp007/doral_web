<?php

namespace App\Http\Controllers\Clincian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $view_path='pages.clincian.';

    public function __construct(){

    }
    //
    public function index(){
        return view($this->view_path.'dashboard');
    }
}
