<?php

namespace App\Http\Controllers;

use App\Models\Messge;
use App\Http\Requests\StoreMessgeRequest;
use App\Http\Requests\UpdateMessgeRequest;

class MessgeController extends Controller
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
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMessgeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMessgeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Messge  $messge
     * @return \Illuminate\Http\Response
     */
    public function show(Messge $messge)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Messge  $messge
     * @return \Illuminate\Http\Response
     */
    public function edit(Messge $messge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMessgeRequest  $request
     * @param  \App\Models\Messge  $messge
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMessgeRequest $request, Messge $messge)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Messge  $messge
     * @return \Illuminate\Http\Response
     */
    public function destroy(Messge $messge)
    {
        //
    }
}
