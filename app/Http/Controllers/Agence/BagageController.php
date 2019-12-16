<?php

namespace App\Http\Controllers\Agence;

use App\Phase;
use App\Bagage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class BagageController extends Controller
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
        $bagages = auth('agence')->user()->bagages;



        return view('agence.bagages.index', compact('bagages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelerins = auth('agence')->user()->pelerins;
        $phases = Phase::latest()->confirmed()->get();
        return view('agence.bagages.create', compact('pelerins', 'phases'));
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
            'poid_bagage' => 'required',
            'nombre_bagages' => 'required',
        ]);

        $dateOperation = date('Y');

        $bagage = new Bagage();

        $bagage->poid_bagage = $request->poid_bagage;
        $bagage->nombre_bagages = $request->nombre_bagages;
        $bagage->pelerin_id = $request->pelerin;
        $bagage->phase_id = $request->phase;
        $bagage->date_operation = $dateOperation;
        $bagage->agence_id = auth('agence')->user()->id;
        $bagage->description = $request->description;

        $bagage->save();
        Toastr::success('Bagage enregistrer avec succè :)', 'Success');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bagage  $bagage
     * @return \Illuminate\Http\Response
     */
    public function show(Bagage $bagage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bagage  $bagage
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagage $bagage)
    {
        $pelerins = auth('agence')->user()->pelerins->operationDate();
        $phases = Phase::latest()->confirmed()->get();
        return view('agence.bagages.edit', compact('bagage', 'phases', 'pelerins'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bagage  $bagage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bagage $bagage)
    {
        // $dateOperation = date('Y');

        // $bagage = new Bagage();

        $bagage->poid_bagage = $request->poid_bagage;
        $bagage->nombre_bagages = $request->nombre_bagages;
        $bagage->pelerin_id = $request->pelerin;
        // $bagage->date_operation = $dateOperation;
        $bagage->agence_id = auth('agence')->user()->id;
        $bagage->description = $request->description;

        if(isset($request->phase)){

            $bagage->phase_id = $request->phase;
        }

        $bagage->save();
        Toastr::success('Bagage enregistrer avec succè :)', 'Success');
        return redirect()->route('bagages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bagage  $bagage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bagage $bagage)
    {
        $bagage->delete();

        Toastr::success('bagage Supprimée avec succè :)', 'Success');

        return redirect()->back();
    }
}
