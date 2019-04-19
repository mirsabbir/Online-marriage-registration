<?php

namespace App\Http\Controllers;

use App\Nid;
use Illuminate\Http\Request;

class NidController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('nid.index');
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
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function show(Nid $nid)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function edit(Nid $nid)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nid $nid)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Nid  $nid
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nid $nid)
    {
        //
    }
}
