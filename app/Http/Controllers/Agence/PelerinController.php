<?php

namespace App\Http\Controllers\agence;

use App\Acount;
use App\Agence;
use App\Agent;
use App\convoit;
use App\pelerin;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tuteur;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PelerinController extends Controller
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
        // $categories = Category::all();
        // $convoits = convoit::all();
        if(auth('agence')->user()->status ==1){

            $pelerins = pelerin::where('agence_id', auth('agence')->user()->id )->operationDate()->latest()->get();

            return view('agence.pelerins.index', compact('pelerins'));

        }else{
            return redirect()->route('agence.login') ;

        }

        //return $pelerins;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth('agence')->user()->status == 1) {

            $agents = Agent::where('agence_id', auth('agence')->user()->id)->get();

            $tuteurs = Tuteur::all();
            return view('agence.pelerins.create', compact('tuteurs', 'agents'));
        } else {
            return redirect()->route('agence.login');
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $dateOperation = date('Y');

        $this->validate($request, [
            'nom' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png,bmp',
            'prenom' => 'required',
            'num_passeport' => 'required', 'unique:pelerins',
            'telephone' => 'required',
            'email' => 'email|max:255',
            'date_naissance' => 'required',
            'date_delivrance' => 'required',
            'date_expiration' => 'required',
        ]);


        $agenceName = auth('agence')->user()->name;
        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = date('Y');

            $imageName = $request->nom . '_' . $request->prenom . '_' . $request->num_passeport . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('plerin/' . $agenceName . '/' . $currentDate)) {

                Storage::disk('public')->makeDirectory('plerin/' . $agenceName . '/' . $currentDate);
            }

            $pelerinImage = Image::make($image)->resize(500, 500)->stream();

            Storage::disk('public')->put('plerin/' . $agenceName . '/' . $currentDate . '/' . $imageName, $pelerinImage);

            $imageNameStorage = 'plerin/' . $agenceName . '/' . $currentDate . '/' . $imageName;
        } else {
            $imageName = "default.png";
        }

        $idUnique = rand(0001, 1000);

        $pelerin = new pelerin();

        // $pelerin->convoit_id = $request->convoit_;
        // $pelerin->category_id = $request->categorie_;
        $pelerin->nom = $request->nom;
        $pelerin->prenom = $request->prenom;
        $pelerin->nom = $request->nom;
        $pelerin->telephone = $request->telephone;
        $pelerin->email = $request->email;
        $pelerin->num_passeport = $request->num_passeport;
        $pelerin->date_naissance =  Carbon::parse($request->date_naissance)->format('d/m/Y');
        $pelerin->date_delivrance =  Carbon::parse($request->date_delivrance)->format('d/m/Y');
        $pelerin->date_expiration =  Carbon::parse($request->date_expiration)->format('d/m/Y');
        $pelerin->type = $request->type;
        $pelerin->image = $imageNameStorage;
        $pelerin->status = false;
        $pelerin->id_pelerin = $idUnique;
        $pelerin->date_operation = $dateOperation;
        $pelerin->agence_id = auth('agence')->user()->id;
        // if (isset($request->agence)) {
        //     $pelerin->agence_id = $request->agence;
        // }
        if (isset($request->agent)) {

            $pelerin->agent_id = $request->agent;
        }
        if (isset($request->convoit)) {
            $pelerin->convoit_id = $request->convoit;
        }
        if (isset($request->tuteur)) {
            $pelerin->tuteur_id = $request->tuteur;
        }
        if (isset($request->status)) {
            $pelerin->status = true;
        } else {

            $pelerin->status = false;
        }

        $pelerin->save();

        // $pelerins = Pelerin::first();
        $acount = new Acount;

        $acount->pelerin_id = $pelerin->id;
        $acount->agence_id = $pelerin->agence->id;
        $acount->nom = $request->nom . '_' . $request->prenom . '_(' . $idUnique . ')';

        $acount->save();

        Toastr::success('Pèlerin enregistrer avec succè :)', 'Success');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function show(pelerin $pelerin)
    {
        // return Carbon::parse($pelerin->date_naissance["birthdate"])->age;
        return view('agence.pelerins.show', compact('pelerin'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function edit(pelerin $pelerin)
    {
        //return $pelerin;
        // $convoits = convoit::where('id', $pelerin->convoit_id)->first()->get();

        // $categories = Category::where('id', $pelerin->category_id)->first()->get() ;

        if(auth('agence')->user()->status ==1){

            return view('agence.pelerins.edit', compact('pelerin','convoits', 'categories'));

        }else{
            return redirect()->route('agence.login') ;

        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, pelerin $pelerin)
    {
        $dateOperation = date('Y');

        $this->validate($request, [
            'nom' => 'required',
            'type' => 'required',
            'prenom' => 'required',
            'num_passeport' => 'required', 'unique:pelerins',
            'telephone' => 'required',
            'email' => 'email|max:255',
            'date_naissance' => 'required',
            'date_delivrance' => 'required',
            'date_expiration' => 'required',
        ]);


        $agenceName = auth('agence')->user()->name;
        $image = $request->file('image');

        if (isset($image)) {
            $currentDate = date('Y');

            $imageName = $request->nom . '_' . $request->prenom . '_' . $request->num_passeport . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('plerin/' . $agenceName . '/' . $currentDate)) {

                Storage::disk('public')->makeDirectory('plerin/' . $agenceName . '/' . $currentDate);
            }

            $pelerinImage = Image::make($image)->resize(500, 500)->stream();

            Storage::disk('public')->put('plerin/' . $agenceName . '/' . $currentDate . '/' . $imageName, $pelerinImage);

            $imageNameStorage = 'plerin/' . $agenceName . '/' . $currentDate . '/' . $imageName;
        } else {
            $imageName = "default.png";
        }

        // $idUnique = rand(0001, 1000);


        // $pelerin->convoit_id = $request->convoit_;
        // $pelerin->category_id = $request->categorie_;
        $pelerin->nom = $request->nom;
        $pelerin->prenom = $request->prenom;
        $pelerin->nom = $request->nom;
        $pelerin->telephone = $request->telephone;
        $pelerin->email = $request->email;
        $pelerin->num_passeport = $request->num_passeport;
        $pelerin->date_naissance = $request->date_naissance;
        $pelerin->date_delivrance = $request->date_delivrance;
        $pelerin->date_expiration = $request->date_expiration;
        $pelerin->type = $request->type;
        if($request->file('image')){
            $pelerin->image = $imageNameStorage;
        }else{

        }
        $pelerin->status = false;
        // $pelerin->id_pelerin = $idUnique;
        $pelerin->date_operation = $dateOperation;
        $pelerin->agence_id = auth('agence')->user()->id;
        // if (isset($request->agence)) {
        //     $pelerin->agence_id = $request->agence;
        // }
        if (isset($request->agent)) {
            $pelerin->agent_id = $request->agent;
        }
        if (isset($request->convoit)) {
            $pelerin->convoit_id = $request->convoit;
        }
        if (isset($request->tuteur)) {
            $pelerin->tuteur_id = $request->tuteur;
        }
        if (isset($request->status)) {
            $pelerin->status = true;
        } else {

            $pelerin->status = false;
        }

        $pelerin->save();


        Toastr::success('Information mis à jour avec succè :)', 'Success');

        return redirect()->route('pelerins.index');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(pelerin $pelerin)
    {
        if(auth('agence')->user()->status ==1){

            if(Storage::disk('public')->exists($pelerin->image))
            {
                Storage::disk('public')->delete($pelerin->image);
            }


            $pelerin->delete();

            Toastr::success('Pelerin(e) Supprimé avec succè :)', 'Success');

            return redirect()->back();

        }else{
            return redirect()->route('agence.login') ;

        }

    }
}
