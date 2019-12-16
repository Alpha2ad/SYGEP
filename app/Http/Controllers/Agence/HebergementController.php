<?php

namespace App\Http\Controllers\Agence;

use App\Hebergement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class HebergementController extends Controller
{
     protected $redirectTo = '/agence/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('agence.auth:agence');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hebergements = Hebergement::where('agence_id', auth('agence')->user()->id )->get();

        return view('agence.hebergements.index', compact('hebergements'));
    }

    public function approvation($id)
    {
        $hebergement = Hebergement::find($id);


        if($hebergement->status == false)
        {
            $hebergement->status = true;

            $hebergement->save();

            Toastr::info('Hebergement " <strong class="  font-underline text-pink-color">'.$hebergement->nom.'</strong> " a été Activé des hebergements de '.$hebergement->agence->name, 'information');
        }else{

            $hebergement->status = false;

            $hebergement->save();
            // return $hebergement->nom;
            Toastr::Warning('Hebergement " <strong class="  font-underline text-pink-color">'.$hebergement->nom.'</strong> " a été désactivé des hebergements de '.$hebergement->agence->name, 'Attention');
        }

        return redirect()->back()->with('message','Hebergement '. $hebergement->nom.' a été désactivé des hebergements de '.$hebergement->agence->name);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agence.hebergements.create');
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
            // 'agence' => 'required',
            'telephone' => 'required'

        ]);

        $dateOperation = date('Y');

        $hebergement = new Hebergement();

        $hebergement->nom = $request->nom;
        $hebergement->adresse = $request->adresse;
        $hebergement->nombre_etage = $request->nombre_etage;
        $hebergement->nombre_chambre = $request->nombre_chambre;
        $hebergement->agence_id = auth('agence')->user()->id;
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

        return redirect()->route('hebergements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Hebergement  $hebergement
     * @return \Illuminate\Http\Response
     */
    public function show(Hebergement $hebergement)
    {
        return view('agence.hebergements.show', compact('hebergement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Hebergement  $hebergement
     * @return \Illuminate\Http\Response
     */
    public function edit(Hebergement $hebergement)
    {
        return view('agence.hebergements.edit', compact('hebergement'));
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
            // 'agence' => 'required',
            'telephone' => 'required'

        ]);

        // $dateOperation = date('Y');

        // $hebergement = new Hebergement();

        $hebergement->nom = $request->nom;
        $hebergement->adresse = $request->adresse;
        $hebergement->nombre_etage = $request->nombre_etage;
        $hebergement->nombre_chambre = $request->nombre_chambre;
        $hebergement->agence_id = auth('agence')->user()->id;
        $hebergement->telephone = $request->telephone;
        $hebergement->description = $request->description;
        // $hebergement->date_operation = $dateOperation;
        if(isset($request->status))
        {
            $hebergement->status = true;

        }else{

            $hebergement->status = false;
        }

        $hebergement->save();

        Toastr::success('Hébergement enregistrer avec succè :)', 'Success');

        return redirect()->route('hebergements.index');
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
