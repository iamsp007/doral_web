<?php

namespace App\Http\Controllers\Clinician;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    protected $view_path='pages.clincian.';

    public function index()
    {
        return view($this->view_path.'dashboard');
    }
}
