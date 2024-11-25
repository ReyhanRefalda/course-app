<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontContoller extends Controller
{
    public function index()
    {
        return view('front.index');
    }
    public function detail()
    {
        return view('front.detail');
    }
    public function beli()
    {
        return view('front.beli');
    }
}
