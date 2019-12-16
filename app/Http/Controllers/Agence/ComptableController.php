<?php

namespace App\Http\Controllers\Agence;

use App\Comptable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
class ComptableController extends Controller
{

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

        if(auth('agence')->user()->status ==1){

            $comptables = Comptable::where('agence_id', auth('agence')->user()->id )->get();

            return view('agence.comptables.index', compact('comptables', 'categories','convoits'));

        }else{
            return redirect()->route('agence.login') ;

        }
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
    public function show($id)
    {
        $comptable = Comptable::find($id);

        return view('agence.comptables.pelerin_by_comptable', compact('comptable'));
    }


    public function approvation($id)
    {
        $comptable = Comptable::find($id);


        if($comptable->status == false)
        {
            $comptable->status = true;

            $comptable->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">'.$comptable->name.'</strong> " a été Activé des comptables de '.$comptable->agence->name, 'information');
        }else{

            $comptable->status = false;

            $comptable->save();
            // return $comptable->name;
            Toastr::Warning('Le compte de " <strong class="  font-underline text-pink-color">'.$comptable->name.'</strong> " a été désactivé des comptables de '.$comptable->agence->name, 'Attention');
        }

        return redirect()->back()->with('message','Le compte de '. $comptable->name.' a été désactivé des comptables de '.$comptable->agence->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comptable  $comptable
     * @return \Illuminate\Http\Response
     */
    public function edit(Comptable $comptable)
    {
        //
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
        //
    }
}
