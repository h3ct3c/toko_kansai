<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pages = 'dashboard';
        $totalProducts = \App\Models\Product::count();
        $totalUsers = \App\Models\User::count();

        return view('layouts.dashboard', compact('pages', 'totalProducts', 'totalUsers'));
    }
}
