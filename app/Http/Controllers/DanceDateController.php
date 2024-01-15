<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Dance;
use App\ld_dance_dates;

use Illuminate\Http\Request;

class DanceDateController extends Controller
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
        $title = 'Line Dances - Add Date';
        $dances = DB::table('dances')
        ->orderby('dance')
        ->get();

        return view('dance.admin.createDate', ['title'=>$title, 'dances' => $dances]);

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

        $this->validate($request, [
            'id_dance'   => 'required',
            'dance_date' => 'required'
        ]);

        $dance_date = new ld_dance_dates( [
            'id_dance' => $request->get('id_dance'),
            'dance_date' => $request->get('dance_date')
        ]);

        $dance_date->save();

        return back()->with('success', 'Data Added');


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
