<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pages = [
            'dashboard' => 'Dashboard',
            'user' => 'user.index',
            'product' => 'produk.index',
            'order' => 'order.index',
            'statistics' => 'statistics.index',
        ];
        return view('layouts.dashboard', compact('pages'));
    }
}

