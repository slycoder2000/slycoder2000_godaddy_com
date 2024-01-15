<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    // public function index() {
    //     $title = 'Welcome to SlyCoder.com!!';
    //     // return view('pages.index', compact('title'));
    //     return view('pages.index')->with('title', $title);
    // }

    public function home() {
        $data = array (
            'title' => 'Welcome to SlyCoder.com!!',
        );
        return view('home')->with($data);
    }

    public function about() {
        $title = 'About Me';
        return view('about')->with('title', $title);
    }

    public function contact() {
        $title = 'Contact Me';
        return view('contact')->with('title', $title);
    }

    public function webapps() {
        $title = 'Web Apps';
        return view('webapps')->with('title', $title);
    }

    public function resources() {
        $title = 'Resources';
        return view('resources')->with('title', $title);
    }


    public function alpha() {
        $title = 'Phonetic Alphabet';
        return view('webapps.alpha')->with('title', $title);
    }

    public function foodbank() {
        $title = 'Food Banks';
        return view('webapps.foodbank.foodbank')->with('title', $title);
    }

    public function displayusers() {
        $title = 'Display Users';
        return view('displayusers')->with('title', $title);
    }

}