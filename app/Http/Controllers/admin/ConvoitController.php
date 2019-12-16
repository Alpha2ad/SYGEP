<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use App\Phase;
use App\Agence;
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
        $convoits = Convoit::latest()->operationDate()->paginate(10);
        return view('admin.convoits.index', compact('convoits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::all();
        $phases = Phase::latest()->confirmed()->get();

        return view('admin.convoits.create', compact('agences', 'phases'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'nom' => 'required',
            'type_vol' => 'required',
            'ville_depart' => 'required',
            'ville_arriver' =>'required',
            'date_depart' => 'required',
            'date_arriver' =>'required',
            'capacite' => 'required',
            'phase' => 'required'


        ]);


        $convoit = new Convoit();

        $convoit->nom = $request->nom;
        $convoit->type_vol = $request->type_vol;
        $convoit->ville_depart = $request->ville_depart;
        $convoit->ville_arriver = $request->ville_arriver;
        $convoit->date_depart = $request->date_depart;
        $convoit->date_arriver = $request->date_arriver;
        $convoit->capacite = $request->capacite;
        $convoit->description = $request->description;
        $convoit->date_operation = date('Y');
        if (isset($request->phase)) {

            $convoit->phase_id = $request->phase;
        }
        // if (isset($request->status)) {

        //     $convoit->status = true;

        // }else {

        //     $convoit->status = false;
        // }

        $convoit->save();
        Toastr::success('Convoit enregistrer avec succè :)', 'Success');

        return redirect()->route('admin.convoits.index');
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
