<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Dance;
use App\songs;
use App\dance_songs;

class DancesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return Dance::orderBy('dance','asc');
        //return Dance::all();

        $title = 'Line Dances';

        
        if(isset($_GET['rose'])) {
            if($_GET['rose']==1) {
                if(isset($_GET['filter'])) {
                    $dances = dance::where('rosefav',1)->where('dance', 'like', $_GET['filter'] . '%')->orderBy('dance','asc')->paginate(20);
                } else {
                    $dances = dance::where('rosefav',1)->orderBy('dance','asc')->paginate(20);
                }
            } else {
                if(isset($_GET['filter'])) {
                    $dances = dance::where('dance', 'like', $_GET['filter'] . '%')->orderBy('dance','asc')->paginate(20);
                } else {
                    $dances = dance::orderBy('dance','asc')->paginate(20);
                }
            }       
        } else {
            if(isset($_GET['filter'])) {
                $dances = dance::where('dance', 'like', $_GET['filter'] . '%')->orderBy('dance','asc')->paginate(20);
            } else {
                $dances = dance::orderBy('dance','asc')->paginate(20);
            }
        }

        if(isset($_GET['search'])) {
            $search = $_GET['search'];
            $dances = dance::where('dance','like','%' . $search . '%')->orderBy('dance','asc')->paginate(20);
        }


        $songs = DB::table('songs')
        -> leftjoin('dance_songs', 'dance_songs.id_song', '=', 'songs.id')
        -> leftjoin('dances', 'dance_songs.id_dance', 'dances.id')
        -> select('dances.id', 'dances.dance', 'songs.title', 'songs.artist') //, 'dances.dance', 'dances.rosefav')
        -> where ('dances.id','!=','null')
        -> orderby('dances.dance')
        -> orderby('songs.title')
        -> get();



        return view("dance.home", ['title'=>$title, 'dances' => $dances, 'songs'=>$songs]);

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $title = 'Line Dances - Add/Edit Dance';
        $dances = DB::table('dances')
        ->orderby('dance')
        ->get();

        return view('dance.admin.createDance', ['title'=>$title, 'dances' => $dances]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'dance'   => 'required'
        ]);

        $dance = new dance( [
            'dance' => $request->get('dance'),
            'choreo' => $request->get('choreo'),
            'contrib' => $request->get('contrib'),
            'rosefav' => (empty($request->get('rosefav'))) ? 'default' : 1,
            'stepsheet' => $request->get('stepsheet'),
            'vid1' => $request->get('vid1'),
            'vid2' => $request->get('vid2'),
            'vid3' => $request->get('vid3'),
            'steps' => $request->get('steps')
            
        ]);

        $dance->save();

        return back()->with('success', 'Dance Added');

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
    public function getDances()
    {
        //
        //return Dance::orderBy('dance','asc');
        return Dance::all();
    }


}
