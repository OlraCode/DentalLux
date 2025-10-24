<?php

namespace App\Http\Controllers;

use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        return view('home');
    }
}
