<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use App\Hebergement;
use App\Agence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HebergementController extends Controller
{
    public function __construct()
    {
        // if($this->middleware('agence.auth:agence') || $this->middleware('auth:admin') && $this->middleware('role:super') ){
        //     $this->middleware('agence.guest:agence');
        // }
         $this->middleware('auth:admin');
        // $this->middleware('role:super');
        // $this->middleware('agence.auth:agence');
        // $this->middleware('agence.guest:agence');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $hebergements = Hebergement::latest()->Operationdate()->get() ;

        return view('admin.hebergements.index', compact('hebergements'));
    }

    public function approvation($id)
    {
        $hebergement = Hebergement::find($id);


        if($hebergement->status == false)
        {
            $hebergement->status = true;

            $hebergement->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">'.$hebergement->name.'</strong> " a été Activé des he$hebergements de '.$hebergement->agence->name, 'information');
        }else{

            $hebergement->status = false;

            $hebergement->save();
            // return $hebergement->name;
            Toastr::Warning('Le compte de " <strong class="  font-underline text-pink-color">'.$hebergement->name.'</strong> " a été désactivé des he$hebergements de '.$hebergement->agence->name, 'Attention');
        }

        return redirect()->back()->with('message','Le compte de '. $hebergement->name.' a été désactivé des he$hebergements de '.$hebergement->agence->name);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::latest()->get();

        return view('admin.hebergements.create', compact('agences'));

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
            'adresse' => 'required',
            'agence' => 'required',
            'telephone' => 'required'

        ]);

        $dateOperation = date('Y');

        $hebergement = new Hebergement();

        $hebergement->nom = $request->nom;
        $hebergement->adresse = $request->adresse;
        $hebergement->nombre_etage = $request->nombre_etage;
        $hebergement->nombre_chambre = $request->nombre_chambre;
        $hebergement->agence_id = $request->agence;
        $hebergement->telephone = $request->telephone;
        $hebergement->description = $request->description;
        $hebergement->date_operation = $dateOperation;
        if(isset($request->status))
        {
            $hebergement->status = true;

        }else{

            $hebergement->status = false;
        }

        $hebergement->save();

        Toastr::success('Hébergement enregistrer avec succè :)', 'Success');

        return redirect()->route('admin.hebergements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hebergement  $hebergement
     * @return \Illuminate\Http\Response
     */
    public function show(Hebergement $hebergement)
    {
        // $hebergement = Hebergement::find($id);
        // return $hebergement->logements()->get() ;
        return view('admin.hebergements.show', compact('hebergement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hebergement  $hebergement
     * @return \Illuminate\Http\Response
     */
    public function edit(Hebergement $hebergement)
    {
        $agences = Agence::all();
        return view('admin.hebergements.edit', compact('hebergement', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Hebergement  $hebergement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hebergement $hebergement)
    {
        $this->validate($request, [
            'nom' => 'required',
            'adresse' => 'required',
            'agence' => 'required',
            'telephone' => 'required'

        ]);

        // $hebergement = new Hebergement();

        $hebergement->nom = $request->nom;
        $hebergement->adresse = $request->adresse;
        $hebergement->nombre_etage = $request->nombre_etage;
        $hebergement->nombre_chambre = $request->nombre_chambre;
        $hebergement->agence_id = $request->agence;
        $hebergement->telephone = $request->telephone;
        $hebergement->description = $request->description;


        if(isset($request->status))
        {
            $hebergement->status = true;

        }else{

            $hebergement->status = false;
        }

        $hebergement->save();

        Toastr::success('Hébergement modifier avec succè :)', 'Success');

        return redirect()->route('admin.hebergements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Hebergement  $hebergement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hebergement $hebergement)
    {
        $hebergement->delete();
        Toastr::success('Supperéssion effectuée avec succè :)', 'Success');
        return redirect()->back();
    }
}
