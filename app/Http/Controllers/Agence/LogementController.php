<?php

namespace App\Http\Controllers\Agence;

use App\Pelerin;
use App\Logement;
use App\Hebergement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class LogementController extends Controller
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
        $logements = Logement::where('agence_id', auth('agence')->user()->id)->operationDate()->paginate(15);
        //  $hebergements = Hebergement::where('agence_id', auth('agence')->user()->id )->get();
       return view('agence.logements.index', compact('logements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelerins = Pelerin::where('agence_id', auth('agence')->user()->id)->get();
         $hebergements = Hebergement::where('agence_id', auth('agence')->user()->id )->get();
       return view('agence.logements.create', compact('hebergements', 'pelerins'));
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
            'hebergement' => 'required',

        ]);
        $dateOperation = date('Y');

        $logement = new Logement();

        $logement->nom = $request->nom;
        $logement->nombre_place = $request->nombre_place;
        $logement->hebergement_id = $request->hebergement;
        $logement->date_operation = $dateOperation;
        $logement->agence_id = auth('agence')->user()->id;
        $logement->description = $request->description;

        if(isset($request->status))
        {
            $logement->status = true;

        }else{

            $logement->status = false;
        }

        $logement->save();

        if(isset($request->pelerins))
        {
            $logement->pelerins()->attach($request->pelerins);
        }

        Toastr::success('Logement enregistrer avec succè :)', 'Success');

        return redirect()->route('logements.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function show(Logement $logement)
    {
        return view('agence.logements.show', compact('logement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function edit(Logement $logement)
    {
        return view('agence.logements.edit', compact('logement'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logement $logement)
    {
        $this->validate($request, [
            'nom' => 'required',
            'hebergement' => 'required',

        ]);
        // $dateOperation = date('Y');

        // $logement = new Logement();

        $logement->nom = $request->nom;
        $logement->nombre_place = $request->nombre_place;
        $logement->hebergement_id = $request->hebergement;
        $logement->agence_id = auth('agence')->user()->id;
        $logement->description = $request->description;

        if(isset($request->status))
        {
            $logement->status = true;

        }else{

            $logement->status = false;
        }

        $logement->save();

        if(isset($request->pelerins))
        {
            $logement->pelerins()->sync($request->pelerins);
        }

        Toastr::success('Logement modifié avec succè :)', 'Success');

        return redirect()->route('logements.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logement $logement)
    {
        $logement->delete();

        Toastr::success('Logement enregistrer avec succè :)', 'Success');

        return redirect()->route('logements.index');
    }
}
