<?php

namespace App\Http\Controllers\Admin;

use App\Acount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $acounts = Acount::latest()->get();
        return view('admin.acounts.index', compact('acounts'));
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
     * @param  \App\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function show(Acount $acount)
    {
        return view('admin.acounts.show', compact('acount'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function edit(Acount $acount)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Acount $acount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Acount  $acount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Acount $acount)
    {
        //
    }
}
