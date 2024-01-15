<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FoodBank;
use App\FoodBankCity;


class FoodBanksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $fbs = FoodBank::all();
        $fbcs = FoodBankCity::all();

        //dd($cities);

            return view('webapps.foodbank.foodbanklist',['fbs' => $fbs,'fbcs'=>$fbcs]);
         
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showAdminList()
    {
        //
        //
        $fbs = FoodBank::orderBy('cityref', 'ASC')->orderBy('name', 'ASC') ->paginate(10);
        //dd($cities);

            return view('webapps.foodbank.showfoodbank',['fbs' => $fbs]);
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $fbcs = FoodBankCity::all();

            return view('webapps.foodbank.addfoodbank',['fbcs' => $fbcs, 'days' => $days]);
        
        
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
        // dd($request);
        $data = request() -> validate([
            'cityref' => 'required|min:2',
            'name' => 'required|min:2',
            'phone' => 'required|digits_between:10,13',
            'address' => 'required|min:2'
        ]);

        $fb  = new FoodBank();
        $fb->name = request('name');
        $fb->phone = substr(request('phone'),0,3).".".substr(request('phone') ,3,3).".".substr(request('phone') ,6,4);
        $fb->address = request('address');
        $fb->address2 = request('address2');
        $fb->days = request('days');
        $fb->starttime = request('starttime');
        $fb->endtime = request('endtime');
        $fb->notes = request('notes');
        $fb->notes2 = request('notes2');
        $fb->cityref = request('cityref');
        $fb->calcDay1 = request('calcDay1');
        $fb->calcDayNum1 = request('calcDayNum1');
        $fb->calcDay2 = request('calcDay2');
        $fb->calcDayNum2 = request('calcDayNum2');
        $fb->calcDay3 = request('calcDay3');
        $fb->calcDayNum3 = request('calcDayNum3');
        $fb->calcDay4 = request('calcDay4');
        $fb->calcDayNum4 = request('calcDayNum4');
        $fb->calcDay5 = request('calcDay5');
        $fb->calcDayNum5 = request('calcDayNum5');
        $fb->calcDay6 = request('calcDay6');
        $fb->calcDayNum6 = request('calcDayNum6');
        $fb->calcDay7 = request('calcDay7');
        $fb->calcDayNum7 = request('calcDayNum7');
        $fb->save();

        return redirect('/webapps/foodbank/addfoodbank')->with('success', 'Foodbank Added');
        //return back();
        //dd($fb );

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
        //return foodbank::find($id);

        return view('webapps.foodbank.showinfofoodbank',['fb' => foodbank::find($id), 'id' => $id]);

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
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $fbcs = FoodBankCity::all();

            return view('webapps.foodbank.editfoodbank',['fb' => foodbank::find($id), 'id' => $id, 'fbcs' => $fbcs, 'days' => $days]);
     
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
        $data = request() -> validate([
            'cityref' => 'required|min:2',
            'name' => 'required|min:2',
            'address' => 'required|min:2'
        ]);

        $fb  = FoodBank::find($id);
        $fb->name = request('name');
        //$fb->phone = substr(request('phone'),0,3).".".substr(request('phone') ,3,3).".".substr(request('phone') ,6,4);
        $fb->phone = request('phone');
        $fb->address = request('address');
        $fb->address2 = request('address2');
        $fb->days = request('days');
        $fb->starttime = request('starttime');
        $fb->endtime = request('endtime');
        $fb->notes = request('notes');
        $fb->notes2 = request('notes2');
        $fb->cityref = request('cityref');
        $fb->calcDay1 = request('calcDay1');
        $fb->calcDayNum1 = request('calcDayNum1');
        $fb->calcDay2 = request('calcDay2');
        $fb->calcDayNum2 = request('calcDayNum2');
        $fb->calcDay3 = request('calcDay3');
        $fb->calcDayNum3 = request('calcDayNum3');
        $fb->calcDay4 = request('calcDay4');
        $fb->calcDayNum4 = request('calcDayNum4');
        $fb->calcDay5 = request('calcDay5');
        $fb->calcDayNum5 = request('calcDayNum5');
        $fb->calcDay6 = request('calcDay6');
        $fb->calcDayNum6 = request('calcDayNum6');
        $fb->calcDay7 = request('calcDay7');
        $fb->calcDayNum7 = request('calcDayNum7');
        $fb->save();

        //return view('webapps.foodbank.showinfofoodbank',['fb' => foodbank::find($id), 'id' => $id]);
        return redirect('/webapps/foodbank/show/'.$id)->with('success', 'Foodbank Updated');
        //return view('webapps.foodbank.showinfofoodbank',['fb' => foodbank::find($id), 'id' => $id]);
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