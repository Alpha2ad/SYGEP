<?php

namespace App\Http\Controllers\Medecin;

use App\Pelerin;
use App\Ordonnance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class OrdonnanceController extends Controller
{
    protected $redirectTo = '/medecin/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('medecin.auth:medecin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ordonnances = Ordonnance::where('agence_id', auth('medecin')->user()->agence->id)->operationDate()->get();

        return view('medecin.ordonnances.index', compact('ordonnances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelerins = Pelerin::where('agence_id', auth('medecin')->user()->agence->id)->operationDate()->get();

        return view('medecin.ordonnances.create', compact('pelerins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $pelerin = Pelerin::where('id', $request->pelerin)->operationDate()->first();

        $this->validate($request, [
            'pelerin' => 'required',
            'description' => 'required',
        ]);
        // return $request;
        $dateOperation = date('Y');

        $ordonnance = new Ordonnance();

        $ordonnance->nom = "Rapport de ".$pelerin->nom. " ".$pelerin->nom." (". $pelerin->id_pelerin.")" ;
        $ordonnance->description = $request->description;
        $ordonnance->medecin_id = auth('medecin')->user()->id;
        $ordonnance->date_operation = $dateOperation;
        $ordonnance->agence_id = auth('medecin')->user()->agence->id;
        $ordonnance->pelerin_id = $request->pelerin;
        $ordonnance->save();
        Toastr::success('Rapport enregistré avec succè :)', 'Success');

        return redirect()->route('medecinOrdonnances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function show(Ordonnance $ordonnance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $ordonnance = Ordonnance::findOrFail($id);

        return view('medecin.ordonnances.edit', compact('ordonnance'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $pelerin = Pelerin::where('id', $request->pelerin)->operationDate()->first();

        $this->validate($request, [
            'pelerin' => 'required',
            'description' => 'required',
        ]);
        // return $request;
        $dateOperation = date('Y');

        // $ordonnance = new Ordonnance();

        $ordonnance->nom = "Rapport de " . $pelerin->nom . " " . $pelerin->nom . " (" . $pelerin->id_pelerin . ")";
        $ordonnance->description = $request->description;
        $ordonnance->medecin_id = auth('medecin')->user()->id;
        $ordonnance->date_operation = $dateOperation;
        $ordonnance->agence_id = auth('medecin')->user()->agence->id;
        $ordonnance->pelerin_id = $request->pelerin;
        $ordonnance->save();
        Toastr::success('Rapport modifié avec succè :)', 'Success');

        return redirect()->route('medecinOrdonnances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ordonnance  $ordonnance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->delete();
        Toastr::success('Rapport supprimé avec succè');
        return redirect()->route('medecinOrdonnances.index');
    }
}
