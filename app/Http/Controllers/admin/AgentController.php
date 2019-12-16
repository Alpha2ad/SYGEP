<?php

namespace App\Http\Controllers\Admin;

use App\Agent;
use App\Agence;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $agents = Agent::latest()->paginate(5);
        return view('agent.auth.show', compact('agences', 'agents'));
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
    public function show(Agent $agent)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function edit(Agent $agent)
    {
        $agences = Agence::All();

        return view('agent.auth.edit', compact('agent', 'agences'));
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
        // $request['active'] = request('activation') ?? 0;
        // unset($request['activation']);
        // $admin->update($request->except('role_id'));
        // $admin->roles()->sync(request('role_id'));

        // return redirect(route('admin.show'))->with('message', "{$admin->name} details are successfully updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agent  $agent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agent $agent)
    {
        // if(Storage::disk('public')->exists('agent/'.$agent->image))
        // {
        //     Storage::disk('public')->delete('agent/'.$agent->image);
        // }

        $agent->delete();

        Toastr::success('agent Supprimé avec succè :)', 'Success');

        return redirect()->back();
    }
}
