<?php

namespace App\Http\Controllers\Agent;

use App\Pelerin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Acount;

class PelerinController extends Controller
{

    public function __construct()
    {
        $this->middleware('agent.auth:agent');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(auth('agent')->user()->status ==1 && auth('agent')->user()->agence->status ==1 )
        {

            $pelerins = pelerin::where('agent_id', auth('agent')->user()->id )->get();

            return view('agent.pelerins.index', compact('pelerins', 'categories','convoits'));

        }else{
            return redirect()->route('agent.login') ;

        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tuteurs = auth('agent')->user()->agence->tuteurs;

        return view ('agent.pelerins.create', compact('tuteurs') );
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

         $agenceName = auth('agent')->user()->agence->name;

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
        $pelerin->agent_id = auth('agent')->user()->id;
        $pelerin->date_operation = $dateOperation;
        $pelerin->agence_id = auth('agent')->user()->agence->id;

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
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function show($id )
    {
        $pelerin = Pelerin::find($id);
        return view('agent.pelerins.show', compact('pelerin')) ;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pelerin = Pelerin::find($id);

        return view('agent.pelerins.edit', compact('pelerin'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'nom' => 'required',
            // 'image' => 'required|mimes:jpeg,jpg,png,bmp',
            'prenom' => 'required',
            'num_passeport' => 'required','unique:pelerins',
            'telephone' => 'required',
            'email' => 'email|max:255',
            'date_naissance' => 'required',
            'date_delivrance' => 'required',
            'date_expiration' => 'required',
        ]);

         //$agences = Agence::where('id', $request->agence_)->first();
        $agenceName = auth('agent')->user()->agence->name;
        $pelerin = Pelerin::find($id);
        $image = $request->file('image');

        if(isset($image))
        {
            $currentDate = date('Y');

            $imageName = $request->nom.'_'.$request->prenom.'_'.$request->num_passeport.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('plerin/'.$agenceName))
                {
                    Storage::disk('public')->makeDirectory('plerin/'.$agenceName);
                }
                if(Storage::disk('public')->exists('plerin/'.$agenceName.$pelerin->image))
                {
                    Storage::disk('public')->delete('plerin/'.$agenceName.$pelerin->image);
                }

                $pelerinImage = Image::make($image)->resize(500, 500)->stream();

                Storage::disk('public')->put('plerin/'.$agenceName.'/'.$currentDate.'/'.$imageName, $pelerinImage);

                $imageNameStorage = 'plerin/'.$agenceName.'/'.$currentDate.'/'.$imageName;
        }else{
            $imageName = "default.png";
        }

        //$pelerin = new pelerin();

        //$pelerin->agence_id = Auth::id();

        //$pelerin->agence_id = $request->agence_;
        $pelerin->agence_id = auth('agent')->user()->agence->id;
        $pelerin->agent_id = auth('agent')->user()->id;
        $pelerin->nom = $request->nom;
        $pelerin->prenom = $request->prenom;
        $pelerin->nom = $request->nom;
        $pelerin->telephone = $request->telephone;
        $pelerin->email = $request->email;
        $pelerin->num_passeport = $request->num_passeport;
        $pelerin->date_naissance = $request->date_naissance;
        $pelerin->date_delivrance = $request->date_delivrance;
        $pelerin->date_expiration = $request->date_expiration;
        if($request->file('image')){
            $pelerin->image = $imageNameStorage;
        }else{

        }

        if(isset($request->status))
        {
            $pelerin->status = true;

        }else{

            $pelerin->status = false;
        }
        //return $pelerin;
        $pelerin->save();

        Toastr::success('Pèlerin(e) modifié(e) avec succè :)', 'Success');

        return redirect()->route('agentPelerins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelerin = Pelerin::find($id);

        if(auth('agent')->user()->status ==1){

            if(Storage::disk('public')->exists($pelerin->image))
            {
                Storage::disk('public')->delete($pelerin->image);
            }


            $pelerin->delete();

            Toastr::success('Pelerin(e) Supprimé avec succè :)', 'Success');

            return redirect()->back();

        }else{
            return redirect()->route('agent.login') ;

        }

    }
}
