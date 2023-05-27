<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MyPlaceController extends Controller
{
    function cv() {
        return view('about_author');
    }
}
