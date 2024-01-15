@extends('layouts.app')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">

<a href="/webapps/foodbank/showAdminList"><button class="btn btn-success">Cancel and Return to List</button></a><br /><br />

        <form action="/webapps/foodbank/updatefoodbank/{{$id}}" method="GET">
            <div class="row">
                <label class="col-3" for="cityref">City Reference:</label> 
                <select name="cityref">
                    <option value="">Select City</option>
    
                    @foreach($fbcs as $fbc)
                    <option value="{{$fbc->city}}" {{$fb->cityref == $fbc->city  ? 'selected' : ''}}>{{$fbc->city}}</option>
                    @endforeach
                </select><br/> 
            </div>
            @if($errors->has('cityref'))
            <div class="row"><div class="text-danger">{{ $errors->first('cityref') }}</div></div>
            @endif
            <div class="row">
                <label class="col-3" for="name">Name</label> <input type="text" class="col-9" name='name'
                    value="{{$fb ->name}}"><br />
            </div>
            @if($errors->has('name'))
            <div class="row"><div class="text-danger">{{ $errors->first('name') }}</div></div>
            @endif
            <div class="row">
                <label class="col-3" for="phone">Phone</label> <input type="text" class="col-5" name='phone'
                    value="{{$fb ->phone}}"><br />
            </div>
            @if($errors->has('phone'))
            <div class="row"><div class="text-danger">{{ $errors->first('phone') }}</div></div>
            @endif                    
            <div class="row">
                <label class="col-3" for="address">Address</label> <input type="text" class="col-9" name='address'
                    value="{{$fb ->address}}"><br />
            </div>
            @if($errors->has('address'))
            <div class="row"><div class="text-danger">{{ $errors->first('address') }}</div></div>
            @endif   
            <div class="row">
                <label class="col-3" for="address2">Address2</label> <input type="text" class="col-9" name='address2'
                    value="{{$fb ->address2}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="days">Days</label> <input type="text" class="col-9" name='days'
                    value="{{$fb ->days}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="starttime">Start Time</label> <input type="text" class="col-5"
                    name='starttime' value="{{$fb ->starttime}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="endtime">End Time</label> <input type="text" class="col-5" name='endtime'
                    value="{{$fb ->endtime}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="notes">Notes</label> <input type="text" class="col-9" name='notes'
                    value="{{$fb ->notes}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="notes2">Notes2</label> <input type="text" class="col-9" name='notes2'
                    value="{{$fb ->notes2}}"><br />
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-4 col-md-2" >Day</div> <div class="col-4 col-md-2" >Iteration (0=everyday)</div> 
            </div>

@include('inc.editfoodbankdays',[ 'i'=>'1', 'fbcalcDay'=>$fb->calcDay1, 'fbcalcDayNum'=>$fb->calcDayNum1  ])
@include('inc.editfoodbankdays',[ 'i'=>'2', 'fbcalcDay'=>$fb->calcDay2, 'fbcalcDayNum'=>$fb->calcDayNum2  ])
@include('inc.editfoodbankdays',[ 'i'=>'3', 'fbcalcDay'=>$fb->calcDay3, 'fbcalcDayNum'=>$fb->calcDayNum3  ])
@include('inc.editfoodbankdays',[ 'i'=>'4', 'fbcalcDay'=>$fb->calcDay4, 'fbcalcDayNum'=>$fb->calcDayNum4  ])
@include('inc.editfoodbankdays',[ 'i'=>'5', 'fbcalcDay'=>$fb->calcDay5, 'fbcalcDayNum'=>$fb->calcDayNum5  ])
@include('inc.editfoodbankdays',[ 'i'=>'6', 'fbcalcDay'=>$fb->calcDay6, 'fbcalcDayNum'=>$fb->calcDayNum6  ])
@include('inc.editfoodbankdays',[ 'i'=>'7', 'fbcalcDay'=>$fb->calcDay7, 'fbcalcDayNum'=>$fb->calcDayNum7  ])

            <br/>

            <input type="submit" class="btn btn-primary" value="Update Food Bank">

            @csrf
        </form>


    </div>
</section>


@endsection