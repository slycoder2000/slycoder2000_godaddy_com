<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Incident;

class IncidentsController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$data = request() -> validate([
        //    'city' => 'required|min:2'
        //]);

        $incident  = new Incident();
        $incident->client_id = 1;
        $incident->date = request('i_date');
        $incident->time = request('i_time');
        $incident->duration = request('i_duration');
        $incident->notes = request('i_notes');
        $incident->hlink = request('i_hlink');

//        $incident->time = substr(request('phone'),0,3).".".substr(request('phone') ,3,3).".".substr(request('phone') ,6,4);
//        $incident->duration = request('address');
//        $date  = new Incident();
//        $date-> request('i_date');
//        $date->save();
        $incident->save();

        return back();
        //dd(request('city'));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
