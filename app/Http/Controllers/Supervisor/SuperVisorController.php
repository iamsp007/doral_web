<?php

namespace App\Http\Controllers\Supervisor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperVisorController extends Controller
{
    protected $view_path='pages.supervisor.';

    public function __construct(){

    }

    public function index(){
        return view($this->view_path.'dashboard');
    }
}
