<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DriverToolsController extends Controller
{
    //


    public function index()
    {
        $title = 'Driver Tools - Calculator';
        return view('webapps.driverTools.calculator')->with('title',$title);   
    }


    public function calculator()
    {
        return view('webapps.driverTools.calculator');   
    }
    public function count()
    {
        return view('webapps.driverTools.count');   
    }
    public function vehicle()
    {
        return view('webapps.driverTools.vehicle');   
    }
    public function goals()
    {
        return view('webapps.driverTools.goals');   
    }

}
