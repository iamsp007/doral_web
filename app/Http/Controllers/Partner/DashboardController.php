<?php

namespace App\Http\Controllers\Partner;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    protected $view_path='pages.partner.';

    public function index()
    {
        $query = User::whereHas('roles',function ($q){
            $q->whereIn('role_id',['4', '6']);
        });

        $total = $query->count();

        $employee = $query->groupBy('status')->select('status', DB::raw('count(*) as total'))->get();

        return view($this->view_path.'dashboard', compact(['total', 'employee']));
    }
}
