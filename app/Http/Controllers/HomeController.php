<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the tracked clicks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.content');
    }

}
