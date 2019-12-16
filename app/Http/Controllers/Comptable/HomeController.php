<?php

namespace App\Http\Controllers\Comptable;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/comptable/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('comptable.auth:comptable');
    }

    /**
     * Show the Comptable dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('comptable.home');
    }

}