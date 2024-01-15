<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FamilyController extends Controller
{
    //


    public function index()
    {
        $title = 'Family - Home';
        return view('family.home')->with('title',$title);
    }


    public function home()
    {
        $title = 'Family - Home';
        return view('family.home')->with('title',$title);
    }
    public function lisa()
    {
        $title = 'Family - Lisa';
        $incidents = DB::table('incidents')
        ->orderby('date')
        ->get();

        return view('family.lisa', ['title'=>$title, 'incidents' => $incidents]);
    }

    public function lisa_seizure_2020_0718()
    {
        $title = 'Family - Lisa Video';
        return view('family.lisa_seizure_2020_0718')->with('title',$title);
    }

    public function carlos()
    {
        $title = 'Family - Carlos';
        return view('family.carlos')->with('title',$title);
    }

    public function aryanna()
    {
        $title = 'Family - Aryanna';
        return view('family.aryanna')->with('title',$title);
    }

    public function alyssa()
    {
        $title = 'Family - Alyssa';
        return view('family.alyssa')->with('title',$title);
    }

    public function animals()
    {
        $title = 'Family - Animals';
        return view('family.animals')->with('title',$title);
    }

    public function pazuzu()
    {
        $title = 'Family - Pazuzu';
        return view('family.Pazuzu')->with('title',$title);
    }

    public function juliet()
    {
        $title = 'Family - Juliet';
        return view('family.juliet')->with('title',$title);
    }

    public function lady()
    {
        $title = 'Family - Lady';
        return view('family.lady')->with('title',$title);
    }

    public function rain()
    {
        $title = 'Family - Rain';
        return view('family.rain')->with('title',$title);
    }

    public function flickers()
    {
        $title = 'Family - Flickers';
        return view('family.flickers')->with('title',$title);
    }

    public function barnswallows()
    {
        $title = 'Family - Barn Swallows';
        return view('family.barnswallows')->with('title',$title);
    }


    












}
