<?php

namespace App\Http\Controllers;

use App\Models\cr;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.index');
    }
    public function details()
    {
        return view('front.details');
    }

}
