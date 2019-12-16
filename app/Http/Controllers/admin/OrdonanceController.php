<?php

namespace App\Http\Controllers\Admin;

use App\Ordonance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrdonanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('medecin.ordonances.index', compact('ordonances'));
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
     * @param  \App\Ordonance  $ordonance
     * @return \Illuminate\Http\Response
     */
    public function show(Ordonance $ordonance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ordonance  $ordonance
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordonance $ordonance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ordonance  $ordonance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordonance $ordonance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ordonance  $ordonance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordonance $ordonance)
    {
        //
    }
}
