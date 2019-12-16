<?php

namespace App\Http\Controllers\admin;

use App\Admin_profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profiles.admin_profile_page');
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
     * @param  \App\Admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function show(Admin_profile $admin_profile)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin_profile $admin_profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin_profile $admin_profile)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin_profile  $admin_profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin_profile $admin_profile)
    {
        //
    }
}
