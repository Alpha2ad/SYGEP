<?php

namespace App\Http\Controllers\Admin;

use App\Comptable;
use App\Agence;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;

class ComptableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comptables = Comptable::latest()->paginate(5);
        // return $comptables;
        return view('comptable.auth.show', compact('comptables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    public function approvation($id)
    {
        $comptable = Comptable::find($id);

        if($comptable->status == false)
        {
            $comptable->status = true;

            $comptable->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">'.$comptable->name.'</strong> " a été Activé des comptables de <strong class="  font-underline text-pink-color">'.$comptable->agence->name.' "</strong> !!! ', 'information');
        }else{

            $comptable->status = false;

            $comptable->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">'.$comptable->name.'</strong> " a été Activé des comptables de <strong class="  font-underline text-pink-color">'.$comptable->agence->name.' "</strong> !!! ', 'information');
        }

        return redirect()->back();
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
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function show(Comptable $comptable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function edit(Comptable $comptable)
    {
        $agences = Agence::All();

        return view('comptable.auth.edit', compact('comptable', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comptable $comptable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comptable $comptable)
    {
        // if(Storage::disk('public')->exists('comptable/'.$comptable->image))
        // {
        //     Storage::disk('public')->delete('comptable/'.$comptable->image);
        // }

        $comptable->delete();

        Toastr::success('Comptable Supprimé avec succè :)', 'Success');

        return redirect()->back();


    }
}
