<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $pages = 'dashboard';
        return view('layouts.dashboard', compact('pages'));
    }
}

