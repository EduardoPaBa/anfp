<?php

namespace App\Http\Controllers;

use App\Models\informefinanciero;
use Illuminate\Http\Request;

class InformefinancieroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('informesfinancieros.create');
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
        return view('informesfinancieros.create');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function show(informefinanciero $informefinanciero)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function edit(informefinanciero $informefinanciero)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, informefinanciero $informefinanciero)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\informefinanciero  $informefinanciero
     * @return \Illuminate\Http\Response
     */
    public function destroy(informefinanciero $informefinanciero)
    {
        //
    }
}
