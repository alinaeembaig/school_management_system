<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function getBrChartData(){
        $users = User::get();
        return response()->json(['users' => $users]);
    }
}
