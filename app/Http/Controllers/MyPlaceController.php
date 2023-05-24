<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyPlaceController extends Controller
{
    function hello() {
        return 'Hello World!';
    }

    function cv() {
        return view('about_author');
    }
}
