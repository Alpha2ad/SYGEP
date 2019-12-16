<?php

namespace App\Http\Controllers\admin;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\pelerin;
use App\Agence;
use App\Agent;
use App\Tuteur;
use App\convoit;
use App\Category;
use App\Acount;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PelerinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


      $agences = Agence::all();

    //  $convoits = convoit::all();

    //  $categories = category::all();

     $pelerins = pelerin::latest()->Operationdate()->get();

     return view('admin.pelerins.index', compact('agences', 'pelerins', 'convoits', 'categories'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agences = Agence::latest()->get();
        $agents = Agent::latest()->get();
        $tuteurs = Tuteur::latest()->get();
        return view('admin.pelerins.create', compact('agences','agents','tuteurs'));
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
            'num_passeport' => 'required','unique:pelerins',
            'telephone' => 'required',
            'email' => 'email|max:255',
            'date_naissance' => 'required',
            'date_delivrance' => 'required',
            'date_expiration' => 'required',
        ]);


         $agences = Agence::where('id', $request->agence)->first();
         $agenceName = $agences->name;
        $image = $request->file('image');

        if(isset($image))
        {
            $currentDate = date('Y');

            $imageName = $request->nom.'_'.$request->prenom.'_'.$request->num_passeport.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('plerin/'.$agenceName.'/'.$currentDate))
                {
                    Storage::disk('public')->makeDirectory('plerin/'.$agenceName.'/'.$currentDate);
                }

                $pelerinImage = Image::make($image)->resize(500, 500)->stream();

                Storage::disk('public')->put('plerin/'.$agenceName.'/'.$currentDate.'/'.$imageName, $pelerinImage);

                $imageNameStorage = 'plerin/'.$agenceName.'/'.$currentDate.'/'.$imageName;
        }else{
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
        $pelerin->id_pelerin = $idUnique ;
        $pelerin->date_operation = $dateOperation;
        if(isset($request->agence))
        {
            $pelerin->agence_id = $request->agence;
        }
        if(isset($request->agent))
        {
            $pelerin->agent_id = $request->agent;
        }
        if(isset($request->convoit))
        {
            $pelerin->convoit_id = $request->convoit;
        }
        if(isset($request->tuteur))
        {
            $pelerin->tuteur_id = $request->tuteur;
        }
        if(isset($request->status))
        {
            $pelerin->status = true;

        }else{

            $pelerin->status = false;
        }

        $pelerin->save();

        // $pelerins = Pelerin::first();
        $acount = new Acount;

        $acount->pelerin_id = $pelerin->id;
        $acount->agence_id = $pelerin->agence->id;
        $acount->nom = $request->nom.'_'.$request->prenom.'_('.$idUnique.')';

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
        $agences = Agence::all();
        return view('admin.pelerins.show', compact('pelerin', 'agences'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function edit(pelerin $pelerin)
    {
        $agences = Agence::latest()->get();
        $agents = Agent::latest()->get();
        $tuteurs = Tuteur::latest()->get();

        return view('admin.pelerins.edit', compact('agences','agents','tuteurs', 'pelerin'));
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

         $agences = Agence::where('id', $request->agence)->first();
         $agenceName = $agences->name;
        $image = $request->file('image');

        if(isset($image))
        {
            $currentDate = date('Y') ;

            $imageName = $request->nom.'_'.$request->prenom.'_'.$request->num_passeport.'.'.$image->getClientOriginalExtension();

            if(!Storage::disk('public')->exists('plerin/'.$agenceName.'/'.$currentDate))
                {
                    Storage::disk('public')->makeDirectory('plerin/'.$agenceName.'/'.$currentDate);
                }
                if(Storage::disk('public')->exists('plerin/'.$agenceName.$pelerin->image))
                {
                    Storage::disk('public')->delete('plerin/'.$agenceName.'/'.$currentDate.$pelerin->image);
                }

                $pelerinImage = Image::make($image)->resize(500, 500)->stream();

                Storage::disk('public')->put('plerin/'.$agenceName.'/'.$currentDate.'/'.$imageName, $pelerinImage);

                $imageNameStorage = 'plerin/'.$agenceName.'/'.$currentDate.'/'.$imageName;
        }else{
            $imageName = "default.png";
        }

        //$pelerin = new pelerin();

        //$pelerin->agence_id = Auth::id();

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

        if(isset($request->agence))
        {
            $pelerin->agence_id = $request->agence;
        }
        if(isset($request->agent))
        {
            $pelerin->agent_id = $request->agent;
        }
        if(isset($request->convoit))
        {
            $pelerin->convoit_id = $request->convoit;
        }
        if(isset($request->tuteur))
        {
            $pelerin->tuteur_id = $request->tuteur;
        }
        if(isset($request->status))
        {
            $pelerin->status = true;

        }else{

            $pelerin->status = false;
        }
        $pelerin->save();

        Toastr::success('Modification effectuer avec succè :)', 'Success');

        return redirect()->route('admin.pelerins.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pelerin  $pelerin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pelerin $pelerin)
    {
        // $agences = Agence::where('id', $request->agence_)->first();
        // $agenceName = $pelerin->agence->name;

        // $currentDate = date('Y') ;

        if(Storage::disk('public')->exists($pelerin->image))
         {
             Storage::disk('public')->delete($pelerin->image);
         }


         $pelerin->delete();

         Toastr::success('Pelerin(e) Supprimé avec succè :)', 'Success');

         return redirect()->back();
    }
}
