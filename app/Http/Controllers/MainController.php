<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Route;

class MainController extends Controller
{
    function cv() {
        return view('about_author');
    }

    function welcome() {
        return view('welcome');
    }

    function about() {
        return view('about');
    }

    function contacts() {
        return view('contacts');
    }
}
