<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function termsAndCondiition()
    {
        return view('page/terms_and_condition');
    }

    public function privacyAndPolicy()
    {
        return view('page/privacy_and_policy');
    }
}
