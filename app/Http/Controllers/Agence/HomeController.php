<?php

namespace App\Http\Controllers\Agence;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/agence/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agence.auth:agence');
    }

    /**
     * Show the Agence dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('agence.home');
    }

}