<?php

namespace App\Http\Controllers\Agence;

use App\Convoit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ConvoitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $convoits =Convoit::where('agence_id', auth('agence')->user()->id)->operationDate()->latest()->get();

        return view('agence.convoits.index', compact('convoits'));
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
     * @param  \App\Convoit  $convoit
     * @return \Illuminate\Http\Response
     */
    public function show(Convoit $convoit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Convoit  $convoit
     * @return \Illuminate\Http\Response
     */
    public function edit(Convoit $convoit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Convoit  $convoit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Convoit $convoit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Convoit  $convoit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Convoit $convoit)
    {
        //
    }
}
