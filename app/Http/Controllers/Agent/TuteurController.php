<?php

namespace App\Http\Controllers\Agent;

use App\Tuteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class TuteurController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuteurs = Tuteur::where('agence_id', auth('agent')->user()->agence->id)->operationDate()->get();
        return view('agent.tuteurs.index', compact('tuteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent.tuteurs.create');
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
            'telephone' => 'required',
            'email' => 'email|max:255',
        ]);
        $dateOperation = date('Y');

        $tuteur = new Tuteur();

        $tuteur->nom = $request->nom;
        $tuteur->email = $request->email;
        $tuteur->telephone = $request->telephone;
        $tuteur->description = $request->description;
        $tuteur->date_operation = $dateOperation;
        $tuteur->agence_id = auth('agent')->user()->agence->id;
        $tuteur->save();
        Toastr::success('Tuteur enregistrer avec succè :)', 'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
     $tuteur = Tuteur::findOrfail($id);
        return view('agent.tuteurs.show', compact('tuteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tuteur = Tuteur::findOrfail($id);
        return view('agent.tuteurs.edit', compact('tuteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tuteur = Tuteur::findOrfail($id);
        // return $request;
        $this->validate($request, [
            'nom' => 'required',
            'telephone' => 'required',
            'email' => 'email|max:255',
        ]);
        // $dateOperation = date('Y');


        $tuteur->nom = $request->nom;
        // $tuteur->prenom = $request->prenom;
        $tuteur->email = $request->email;
        $tuteur->telephone = $request->telephone;
        $tuteur->description = $request->description;
        $tuteur->agence_id = auth('agent')->user()->agence->id;

        $tuteur->save();

        Toastr::success('Tuteur Modifier avec succè :)', 'Success');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tuteur = Tuteur::findOrfail($id);
        $tuteur->delete();
        Toastr::success('Tuteur supprimer avec succè :)', 'Success');
        return redirect()->back();
    }
}
