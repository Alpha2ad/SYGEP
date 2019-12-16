<?php

namespace App\Http\Controllers\Admin;

use App\Medecin;
use App\Agence;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class medecinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $medecins = medecin::latest()->paginate(5);
        return view('medecin.auth.show', compact('agences', 'medecins'));
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
        $medecin = Medecin::find($id);


        if ($medecin->status == false) {
            $medecin->status = true;

            $medecin->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">' . $medecin->name . '</strong> " a été Activé des medecins de ' . $medecin->agence->name, 'information');
        } else {

            $medecin->status = false;

            $medecin->save();
            // return $medecin->name;
            Toastr::Warning('Le compte de " <strong class="  font-underline text-pink-color">' . $medecin->name . '</strong> " a été désactivé des medecins de ' . $medecin->agence->name, 'Attention');
        }

        return redirect()->back()->with('message', 'Le compte de ' . $medecin->name . ' a été désactivé des medecins de ' . $medecin->agence->name);
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
     * @param  \App\medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function show(Medecin $medecin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function edit(Medecin $medecin)
    {
        $agences = Agence::All();

        return view('medecin.auth.edit', compact('medecin', 'agences'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Medecin $medecin)
    {
        // $request['active'] = request('activation') ?? 0;
        // unset($request['activation']);
        // $admin->update($request->except('role_id'));
        // $admin->roles()->sync(request('role_id'));

        // return redirect(route('admin.show'))->with('message', "{$admin->name} details are successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\medecin  $medecin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medecin $medecin)
    {
        // if(Storage::disk('public')->exists('medecin/'.$medecin->image))
        // {
        //     Storage::disk('public')->delete('medecin/'.$medecin->image);
        // }

        $medecin->delete();

        Toastr::success('Medecin Supprimé avec succè :)', 'Success');

        return redirect()->back();
    }
}
