<?php

namespace App\Http\Controllers\Admin;

use App\Agence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class AgenceController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->middleware('role:super', ['only'=>'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agences = Agence::latest()->paginate(5);
        return view('agence.auth.show', compact('agences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show(Agence $agence)
    {

    }


    public function approvation($id)
    {
        $agence = Agence::find($id);


        if($agence->status == false)
        {
            $agence->status = true;

            $agence->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">'.$agence->name.'</strong> " a été Activé des succè', 'information');
        }else{

            $agence->status = false;

            $agence->save();
            // return $agence->name;
            Toastr::Warning('Le compte de " <strong class="  font-underline text-pink-color">'.$agence->name.'</strong> " a été désactivé ', 'Attention');
        }

        return redirect()->back()->with('message','Le compte de '. $agence->name.' a été désactivé');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit(Agence $agence)
    {
        return view('agence.auth.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agence $agence)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agence $agence)
    {
        $agence->delete();

        Toastr::success('agence Supprimé avec succè :)', 'Success');

        return redirect()->back();
    }
}
