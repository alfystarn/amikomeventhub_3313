<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Fungsi ini memerintahkan Laravel untuk membuka file resources/views/welcome.blade.php
        return view('welcome');
    }
}