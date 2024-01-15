<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\dances;
use App\songs;
use App\dance_songs;

class SongDancesController extends Controller
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

    public function selectSong()
    {
        $title = 'Select Song to add dances to';

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

        return view('dance.admin.selectSong', ['title'=>$title, 'songs' => $songs]);

    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $song = DB::table('songs')
        ->where('id',$request->id_song)
        ->first();

        $title = "Add dances to " . $song->title;

        $dances = DB::table('dances')
        ->orderby('dance')
        ->get();

        $dance_songs = DB::table('dance_songs')
        ->where('id_song',$request->id_song)
        ->get();

        return view('dance.admin.createDanceLink2Song', ['title'=>$title, 'dances' => $dances, 'dance_songs' => $dance_songs]);
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

    public function storeAllDances(Request $request)
    {

        $song = $request->get('song');
        //$songs= array();
        //$songs=$request->get('song');
        //$songs = implode(', ', $_POST['song']);

        // remove all items in dance_songs with dance=request.dance
        DB::delete('delete from dance_songs where id_song = ?',[$song]);

        // cycle through all items in query string and add all songs
        if ($request->has(['dancelist'])) {
            //
            $dances = array();
            $dances = explode(",",$request->get('dancelist'));
        
        }

            for ($x = 0; $x <= count($dances)-1; $x++) {
                $addDance = new dance_songs( [
                    'id_song' => $song,
                    'id_dance' => $dances[$x]
                ]);

                $addDance->save();
              }



        return back()->with('success', 'Dances Updated');
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
