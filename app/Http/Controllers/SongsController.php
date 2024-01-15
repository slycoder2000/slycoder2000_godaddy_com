<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\songs;

use Illuminate\Http\Request;

class SongsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //  $data=[
            $title = 'Song List';


            if(isset($_GET['filter'])) {

                $songs = DB::table('songs')
                -> leftjoin('dance_songs', 'dance_songs.id_song', '=', 'songs.id')
                -> leftjoin('dances', 'dance_songs.id_dance', 'dances.id')
                -> select('songs.id', 'songs.title', 'songs.artist', 'dances.dance', 'dances.rosefav')
                -> where('songs.title', 'like', $_GET['filter'] . '%')
                -> orderby('songs.title')
                -> orderby('dances.dance')
                -> get();

            } else {

                $songs = DB::table('songs')
                -> leftjoin('dance_songs', 'dance_songs.id_song', '=', 'songs.id')
                -> leftjoin('dances', 'dance_songs.id_dance', 'dances.id')
                -> select('songs.id', 'songs.title', 'songs.artist', 'dances.dance', 'dances.rosefav')
                -> orderby('songs.title')
                -> orderby('dances.dance')
                -> get();
            }
            
                // $songs = songs::where('title', 'like', '%' . $_GET['filter'] . '%');



            return view("dance.songlist", ['title'=>$title, 'songs' => $songs]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    
        $title = 'Line Dances - Add/Edit Song';

        if(isset($_GET['filter'])) {
            $songs = DB::table('songs')
            ->where('title', 'like', $_GET['filter'] . '%')
            ->orderby('title')
            ->get();        
        } else {
            $songs = DB::table('songs')
            ->orderby('title')
            ->get();
        }
        return view('dance.admin.addSong', ['title'=>$title, 'songs' => $songs]);
                
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
            'title'   => 'required',
            'artist' => 'required'
        ]);

        $songs = new songs( [
            'title' => $request->get('title'),
            'artist' => $request->get('artist')
        ]);

        $songs->save();

        return back()->with('success', 'Song Added');

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
