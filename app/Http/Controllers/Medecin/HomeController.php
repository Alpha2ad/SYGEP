<?php

namespace App\Http\Controllers\Medecin;

// use Illuminate\Support\Facades\Auth;
use App\Pelerin;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $redirectTo = '/medecin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }

    /**
     * Show the Medecin dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        $pelerins = Pelerin::where('agence_id', auth('medecin')->user()->agence->id)->get();

        return view('medecin.home', compact('pelerins'));
    }

}
