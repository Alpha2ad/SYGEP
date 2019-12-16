<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/agent/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }

    /**
     * Show the Agent dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return view('agent.home');
    }

}