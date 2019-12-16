<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Phase;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PhaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $phases = Phase::All();

        return view('admin.phases.index', compact('phases'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.phases.create');
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

        ]);

        $phase = new Phase();

        $phase->nom = $request->nom;
        $phase->description = $request->description;
        $phase->date_operation = date('Y');

        if(isset($request->status))
        {
            $phase->status = true;

        }else{

            $phase->status = false;
        }
        $phase->save();
        Toastr::success('Phase enregistrer avec succè :)', 'Success');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function show(Phase $phase)
    {
        //
    }
    public function approvation($id)
    {
        $phase = Phase::find($id);
        // return $phase;

        if($phase->status == false)
        {
            $phase->status = true;

            $phase->save();

            Toastr::info('La phase " <strong class="  font-underline text-pink-color">'.$phase->nom.'</strong> " a été Activé avec succè' );
        }else{

            $phase->status = false;

            $phase->save();
            // return $agent->nom;
            Toastr::Warning('La phase " <strong class="  font-underline text-pink-color">'.$phase->nom.'</strong> " a été désactivé avec succè' );
        }

        return redirect()->back()->with('message','La phase '. $phase->nom.' a été désactivé avec succè ');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function edit(Phase $phase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phase $phase)
    {
        $this->validate($request, [

            'nom' => 'required',

        ]);

        // $phase = new Phase();

        $phase->nom = $request->nom;
        $phase->description = $request->description;
        $phase->date_operation = date('Y');

        if(isset($request->status))
        {
            $phase->status = true;

        }else{

            $phase->status = false;
        }
        $phase->save();
        Toastr::success('Phase modifié avec succè :)', 'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phase  $phase
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phase $phase)
    {
        $phase->delete();

        Toastr::success('Phase Supprimée avec succè :)', 'Success');

         return redirect()->back();
    }
}
