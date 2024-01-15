@extends('layouts.app')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">

        <form action="/webapps/foodbank/savefoodbank" method="POST">
            <div class="row">
                <label class="col-3" for="cityref">City Reference:</label> 
                <select name="cityref">
                    <option value="">Select City</option>
    
                    @foreach($fbcs as $fbc)
                    <option value="{{$fbc->city}}">{{$fbc->city}}</option>
                    @endforeach
                </select><br/> 
            </div>
            @if($errors->has('cityref'))
            <div class="row"><div class="text-danger">{{ $errors->first('cityref') }}</div></div>
            @endif
            <div class="row">
                <label class="col-3" for="name">Name</label> <input type="text" class="col-9" name='name'
                    value="{{old('name')}}"><br />
            </div>
            @if($errors->has('name'))
            <div class="row"><div class="text-danger">{{ $errors->first('name') }}</div></div>
            @endif
            <div class="row">
                <label class="col-3" for="phone">Phone</label> <input type="text" class="col-5" name='phone'
                    value="{{old('phone')}}"><br />
            </div>
            @if($errors->has('phone'))
            <div class="row"><div class="text-danger">{{ $errors->first('phone') }}</div></div>
            @endif                    
            <div class="row">
                <label class="col-3" for="address">Address</label> <input type="text" class="col-9" name='address'
                    value="{{old('address')}}"><br />
            </div>
            @if($errors->has('address'))
            <div class="row"><div class="text-danger">{{ $errors->first('address') }}</div></div>
            @endif   
            <div class="row">
                <label class="col-3" for="address2">Address2</label> <input type="text" class="col-9" name='address2'
                    value="{{old('address2')}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="days">Days</label> <input type="text" class="col-9" name='days'
                    value="{{old('days')}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="starttime">Start Time</label> <input type="text" class="col-5"
                    name='starttime' value="{{old('starttime')}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="endtime">End Time</label> <input type="text" class="col-5" name='endtime'
                    value="{{old('endtime')}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="notes">Notes</label> <input type="text" class="col-9" name='notes'
                    value="{{old('notes')}}"><br />
            </div>
            <div class="row">
                <label class="col-3" for="notes2">Notes2</label> <input type="text" class="col-9" name='notes2'
                    value="{{old('notes2')}}"><br />
            </div>
            <div class="row">&nbsp;</div>
            <div class="row">
            <div class="col-4 col-md-2" >Day</div> <div class="col-4 col-md-2" >Iteration (0=everyday)</div> 
            </div>
            @for ($i = 1; $i <=7; $i++)
                <div class="row">
                {{ $i }}
                <select class="col-4 col-md-2" name="calcDay{{ $i }}">
                    <option value="">Select day</option>
                    @foreach($days as $day)
                    <option value="{{$day}}">{{$day}}</option>
                    @endforeach
                </select>
                <input type="text" class="col-4 col-md-2" name='calcDayNum{{ $i }}'>
                </div>
            @endfor


            <br/>

            <input type="submit" class="btn btn-primary" value="Add Food Bank">

            @csrf
        </form>


    </div>
</section>


@endsection