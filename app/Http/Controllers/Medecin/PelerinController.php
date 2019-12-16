<?php

namespace App\Http\Controllers\Medecin;

use Illuminate\Support\Facades\Auth;
use App\Pelerin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelerins = Pelerin::where('id', auth('medecin')->user()->agence->id);
        return $pelerins;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function show(Pelerin $pelerin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function edit(Pelerin $pelerin)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelerin $pelerin)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelerin $pelerin)
    {
        //
    }
}
