<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Tuteur;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tuteurs = Tuteur::latest()->Operationdate()->get() ;
        return view('admin.tuteurs.index', compact('tuteurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tuteurs.create');
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
            // 'prenom' => 'required',
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
        if (isset($request->agence)) {
            $tuteur->agence_id = $request->agence;
        }
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
    public function show(Tuteur $tuteur)
    {
        return view('admin.tuteurs.show', compact('tuteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Tuteur $tuteur)
    {
        return view('admin.tuteurs.edit', compact('tuteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tuteur  $tuteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tuteur $tuteur)
    {
        $this->validate($request, [
            'nom' => 'required',
            // 'prenom' => 'required',
            'telephone' => 'required',
            'email' => 'email|max:255',
        ]);


        $tuteur->nom = $request->nom;
        $tuteur->email = $request->email;
        $tuteur->telephone = $request->telephone;
        $tuteur->description = $request->description;
        if (isset($request->agence)) {
            $tuteur->agence_id = $request->agence;
        }

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
    public function destroy(Tuteur $tuteur)
    {
        $tuteur->delete();
        Toastr::success('Tuteur supprimer avec succè :)', 'Success');
        return redirect()->back();
    }
}
