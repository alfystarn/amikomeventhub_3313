<?php

namespace App\Http\Controllers;

use App\Models\Partner; // INI YANG KURANG, WAJIB ADA!
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        
        return view('welcome', compact('partners'));
    }
}