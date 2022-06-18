<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class MainController extends Controller
{
    public function index() {
        return view('home.index');
    }
}
