<?php

namespace App\Http\Controllers\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Paiement;
use App\Acount;
use App\Agence;
use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PaiementController extends Controller
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

        $paiements = Paiement::all();
        return view('admin.paiements.index', compact('paiements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $acounts = Acount::all();
        $agences = Agence::all();
        $agents = Agent::all();
        return view('admin.paiements.create', compact('acounts', 'agences', 'agents'));
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

            'montant' => 'required',
            'acount' => 'required',

        ]);
        // $agences = Agence::where('id', $request->agence)->first();
        $acount = Acount::where('id', $request->acount)->first();
         $agenceName = $acount->pelerin->agence->name;

         $paimentName = $acount->nom.'_'.$request->montant.'_'.date('j-m-Y');

        $image = $request->file('image');

        if(isset($image))
        {
            $currentDate = date('Y');

            $imageName = $paimentName.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('paiments/'.$agenceName.'/'.$currentDate))
                {
                    Storage::disk('public')->makeDirectory('paiments/'.$agenceName.'/'.$currentDate);
                }

                $paiementImage = Image::make($image)->stream();

                Storage::disk('public')->put('paiments/'.$agenceName.'/'.$currentDate.'/'.$imageName, $paiementImage);

                $imageNameStorage = 'paiments/'.$agenceName.'/'.$currentDate.'/'.$imageName;
        }else{
            $imageName = "default.png";
        }
        $paiement = new Paiement();
        $paiement->name = $paimentName;
        $paiement->date_operation = date('Y');
        $paiement->montant = $request->montant;
        $paiement->description = $request->description;
        $paiement->agence_id = $acount->pelerin->agence->id;
        $paiement->acount_id = $request->acount;
        $paiement->image = $imageNameStorage;
        if(isset($request->agent)){
            $paiement->agent_id = $request->agent;
        }
        if(isset($request->comptable)){
            $paiement->comptable_id = $request->comptable;
        }
        if(isset($request->status))
        {
            $paiement->status = true;

        }else{

            $paiement->status = false;
        }

        $paiement->save();

        Toastr::success('Paiement enregistrer avec succè :)', 'Success');

        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function show(Paiement $paiement)
    {
        return view('admin.paiements.show', compact('paiement'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function edit(Paiement $paiement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Paiement $paiement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Paiement  $paiement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Paiement $paiement)
    {
        if(Storage::disk('public')->exists($paiement->image))
         {
             Storage::disk('public')->delete($paiement->image);
         }
         $paiement->delete();

         Toastr::success('paiement Supprimé avec succè :)', 'Success');

         return redirect()->back();
    }
}
