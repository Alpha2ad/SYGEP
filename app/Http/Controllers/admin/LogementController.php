<?php

namespace App\Http\Controllers\Admin;

use Brian2694\Toastr\Facades\Toastr;
use App\Agence;
use App\Pelerin;
use App\Logement;
use App\Hebergement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogementController extends Controller
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
        $logements = Logement::latest()->Operationdate()->get() ;

        return view('admin.logements.index', compact('logements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelerins = Pelerin::latest()->get();
        $hebergements = Hebergement::latest()->Operationdate()->get() ;
        return view('admin.logements.create', compact('pelerins', 'hebergements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
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

        // $post->tags()->attach($request->tags);

        Toastr::success('Logement enregistrer avec succè :)', 'Success');

        return redirect()->route('admin.logements.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function show(Logement $logement)
    {

        return view('admin.logements.show', compact('logement')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Logement  $logement
     * @return \Illuminate\Http\Response
     */
    public function edit(Logement $logement)
    {
        $pelerins = Pelerin::latest()->Operationdate()->get();
        $hebergements = Hebergement::latest()->Operationdate()->get() ;
        return view('admin.logements.create', compact('pelerins', 'hebergements', 'logement'));
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
            // 'hebergement' => 'required',

        ]);
        $dateOperation = date('Y');

        // $logement = new Logement();

        $logement->nom = $request->nom;
        $logement->nombre_place = $request->nombre_place;
        $logement->date_operation = $dateOperation;
        $logement->description = $request->description;
        if(isset($request->hebergement))
        {
            $logement->hebergement_id = $request->hebergement;
        }

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

        // $post->tags()->attach($request->tags);

        Toastr::success('Logement Modifier avec succè :)', 'Success');

        return redirect()->route('admin.logements.index');
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

        return redirect()->route('admin.logements.index');
    }
}
