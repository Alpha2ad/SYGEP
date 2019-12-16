<?php

namespace App\Http\Controllers\Agence;

use App\Agent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;


class AgentController extends Controller
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
        if(auth('agence')->user()->status ==1){

            $agents = Agent::where('agence_id', auth('agence')->user()->id )->get();

            return view('agence.agents.index', compact('agents', 'categories','convoits'));

        }else{
            return redirect()->route('agence.login') ;

        }
    }


    public function approvation($id)
    {
        $agent = Agent::find($id);


        if($agent->status == false)
        {
            $agent->status = true;

            $agent->save();

            Toastr::info('Le compte de " <strong class="  font-underline text-pink-color">'.$agent->name.'</strong> " a été Activé des agents de '.$agent->agence->name, 'information');
        }else{

            $agent->status = false;

            $agent->save();
            // return $agent->name;
            Toastr::Warning('Le compte de " <strong class="  font-underline text-pink-color">'.$agent->name.'</strong> " a été désactivé des agents de '.$agent->agence->name, 'Attention');
        }

        return redirect()->back()->with('message','Le compte de '. $agent->name.' a été désactivé des agents de '.$agent->agence->name);
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
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);

        return view('agence.agents.pelerin_by_agent', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        //
    }
}
