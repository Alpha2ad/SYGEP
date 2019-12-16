<?php

namespace App\Http\Controllers\admin;

use Brian2694\Toastr\Facades\Toastr;
use App\Bagage;
use App\Phase;
use App\Pelerin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BagageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pelerins = Pelerin::All();
        $bagages = Bagage::latest()->paginate(10);
        return view('admin.bagages.index', compact('pelerins', 'bagages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pelerins = Pelerin::All();
        $phases = Phase::latest()->confirmed()->get();
        return view('admin.bagages.create', compact('pelerins', 'phases'));
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

        $bagage = New Bagage();

        $bagage->poid_bagage=$request->poid_bagage;
        $bagage->nombre_bagages=$request->nombre_bagages;
        $bagage->pelerin_id=$request->pelerin;
        $bagage->phase_id = $request->phase;
        $bagage->date_operation = $dateOperation;
        $bagage->description=$request->description;

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
        // $bagage = Bagage::find($id);
        // return $bagage;
        return $bagage->pelerin;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bagage  $bagage
     * @return \Illuminate\Http\Response
     */
    public function edit(Bagage $bagage)
    {
        $pelerins = Pelerin::All();
        return view('admin.bagages.edit', compact('bagage', 'pelerins'));
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
        $this->validate($request, [
            'poid_bagage' => 'required',
            'nombre_bagages' => 'required',
        ]);

        // $bagage = New Bagage();

        $bagage->poid_bagage=$request->poid_bagage;
        $bagage->nombre_bagages=$request->nombre_bagages;
        $bagage->pelerin_id=$request->pelerin;
        $bagage->description=$request->description;

        $bagage->save();
        Toastr::success('Modification effectuée avec succè :)', 'Success');
        return redirect()->route('admin.bagages.index');
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
        Toastr::success('Supression effectuée avec succè :)', 'Success');
        return redirect()->route('admin.bagages.index');
    }
}
