<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\songs;
use App\dances;
use App\dance_songs;

use Illuminate\Http\Request;

class DanceSongsController extends Controller
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


    public function selectDance()
    {
        $title = 'Select Dance to add songs to';

        if(isset($_GET['filter'])) {
            $dances = DB::table('dances')
            ->where('dance', 'like', $_GET['filter'] . '%')
            ->orderby('dance')
            ->get();
        } else {
            $dances = DB::table('dances')
            ->orderby('dance')
            ->get();
        }

        return view('dance.admin.selectDance', ['title'=>$title, 'dances' => $dances]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $dance = DB::table('dances')
        ->where('id',$request->id_dance)
        ->first();

        $title = "Add songs to " . $dance->dance;

        $songs = DB::table('songs')
        ->orderby('title')
        ->get();

        $dance_songs = DB::table('dance_songs')
        ->where('id_dance',$request->id_dance)
        ->get();

        return view('dance.admin.createSong', ['title'=>$title, 'songs' => $songs, 'dance_songs' => $dance_songs]);

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

    public function storeAllSongs(Request $request)
    {

        $dance = $request->get('dance');
        //$songs= array();
        //$songs=$request->get('song');
        //$songs = implode(', ', $_POST['song']);

        // remove all items in dance_songs with dance=request.dance
        DB::delete('delete from dance_songs where id_dance = ?',[$dance]);

        // cycle through all items in query string and add all songs
        if ($request->has(['songlist'])) {
            //
            $songs = array();
            $songs = explode(",",$request->get('songlist'));
        
        }

            for ($x = 0; $x <= count($songs)-1; $x++) {
                $addSong = new dance_songs( [
                    'id_dance' => $dance,
                    'id_song' => $songs[$x]
                ]);

                $addSong->save();
              }



        return back()->with('success', 'Songs Updated');
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
