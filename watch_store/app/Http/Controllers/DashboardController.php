<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    //

    public function index(){

        $totaluser = User::count();
        $totalprice = Product::sum('price');
        $totalproduct = Product::count();

        return view('admin.dashboard')->with(compact('totalprice', 'totaluser', 'totalproduct'));
    }
}
