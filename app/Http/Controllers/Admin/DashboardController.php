<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        // Memanggil view resources/views/admin/dashboard.blade.php
        return view('admin.dashboard');
    }
}