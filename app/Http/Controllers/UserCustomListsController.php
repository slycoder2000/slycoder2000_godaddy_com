<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;
use App\Models\customlists;
use App\Models\customlists_dances;
use App\dances;


use App\Dance;
use App\songs;
use App\dance_songs;



class UserCustomListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $title = 'Custom Lists';

        $customlists = DB::table('customlists')
        ->where('id_user', \Auth::id() )
        ->orderby('listname')
        ->get();


        $dances = DB::table('dances')
        ->where('id', '=' , $request->id_dance )
        ->first();

        // to-do filter futher by adding a where clause that has id_customlists of current user ($customlists)
        $customlists_dances = DB::table('customlists_dances')
        ->where('id_dances', '=' , $request->id_dance )
        ->get();

        
        return view('dance.usercustomlists.index', ['title'=>$title, 'dance' => $dances->dance, 'customlists' => $customlists, 'customlists_dances' => $customlists_dances ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        $id_user = \Auth::id();

        $formFields = $request->validate([

            'listname' => ['required',
                        Rule::unique('customlists')->where(function ($query) {
                return $query->where('id_user', '=' , \Auth::id());})
                ]
        
            //    'listname' => ['required',
            //    Rule::unique('customlistsa')->ignore($id_user)
            //]
        
            ]);

        $customlists = new customlists([
            'id_user' => $id_user,
            'listname' => $request->get('listname')
        ]);

        $customlists -> save();
        return back()->with('success', 'Custom list Added');
        //return redirect('webapps/dance/usercustomlists/index');
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
        $id_dances = $request->get('id_dances');
        //$songs= array();
        //$songs=$request->get('song');
        //$songs = implode(', ', $_POST['song']);

        // remove all items in customlists_dances with dance=request.id_dance for current user
    ////DB::delete('delete from customlists_dances where id_list id_dance = ?',[$song]);
            $AllUserLists = customlists::CurrentUser()->get();
            for ($x = 0; $x <= count($AllUserLists)-1; $x++) {
                $deleted = DB::table('customlists_dances')
                            ->where('id_customlists', '=', $AllUserLists[$x]->id)
                            ->where('id_dances', '=', $id_dances)
                            ->delete();
            }


        // cycle through all items in query string and add all songs
        if (!empty($request->get('customlists'))){
            
            if ($request->has(['customlists'])) {
                //

                $customlists = array();
                $customlists = explode(",",$request->get('customlists'));
            }

            for ($x = 0; $x <= count($customlists)-1; $x++) {
                $addDance = new customlists_dances( [
                    'id_customlists' => $customlists[$x],
                    'id_dances' => $id_dances
                ]);
            
                $addDance->save();
            }
                
        }

        return back()->with('success', 'Lists Updated');
        //return redirect('webapps/dance/usercustomlists/index');
        //return "creating custom list " . $id_user . $request->listname ;
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

        $AllowAccess=false;
        $AllUserLists = customlists::CurrentUser()->get();
        for ($x = 0; $x <= count($AllUserLists)-1; $x++) {
             if($id==$AllUserLists[$x]->id) $AllowAccess=true;
        }
        
if(!$AllowAccess) return back()->with('error', 'Invalid List');;


        $customlist = DB::table('customlists')
        ->where('id', '=' , $id )
        ->first();
      
        $title="Custom List [{$customlist->listname}]";

        if(isset($_GET['filter'])) {
            // $dances = dance::where('dance', 'like', $_GET['filter'] . '%')->orderBy('dance','asc')->paginate(20);
            $dances = DB::table('customlists_dances')
                -> leftjoin('dances', 'customlists_dances.id_dances', 'dances.id')
                -> where('customlists_dances.id_customlists','=', $id)
                -> where('dance', 'like', $_GET['filter'] . '%')
                -> orderby('dances.dance','asc')
                -> paginate(20);

        } else {
            // $dances2 = dance::orderBy('dance','asc')->paginate(20);
            $dances = DB::table('customlists_dances')
                -> leftjoin('dances', 'customlists_dances.id_dances', 'dances.id')
                -> where('customlists_dances.id_customlists','=', $id)
                -> orderby('dances.dance','asc')
                -> paginate(20);

            // -> leftjoin('customlists_dances', 'customlists_dances.id_dances', '=', 'dances.id')
            // -> select('dances.id','dances.dance','dances.stepsheet','dances.steps','dances.vid1')
            // -> get();
        }
// dd($dances, $dances2);
        $songs = DB::table('songs')
        -> leftjoin('dance_songs', 'dance_songs.id_song', '=', 'songs.id')
        -> leftjoin('dances', 'dance_songs.id_dance', 'dances.id')
        -> select('dances.id', 'dances.dance', 'songs.title', 'songs.artist') //, 'dances.dance', 'dances.rosefav')
        -> where ('dances.id','!=','null')
        -> orderby('dances.dance')
        -> orderby('songs.title')
        -> get();



        // return view("dance.home", ['title'=>$title, 'dances' => $dances, 'songs'=>$songs]);


        return view('dance.usercustomlists.mylist', ['customid'=>$id, 'title'=>$title, 'dances' => $dances, 'songs'=>$songs]);
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
