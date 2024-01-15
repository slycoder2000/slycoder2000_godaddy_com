@extends('layouts.app')

@section('content')

<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">


        <div class='card' style='min-width:12rem; margin-bottom:40px;' >
            <div class='card-body'>
                <h5 class='card-title'>{{$fb -> name}}</h5><br>
                {{$fb -> phone}}<br>
                {{$fb -> address}}<br>
                {{$fb -> address2}}<br>
                {{$fb -> days}}<br>
                {{$fb -> starttime}}<br>
                {{$fb -> endtime}}<br>
                {{$fb -> notes}}<br>
                {{$fb -> notes2}}

                <div class="row">
                <div class="col-2">1 {{$fb -> calcDay1}}</div>
                <div class="col-2">{{$fb -> calcDayNum1}}</div>
                </div>

                <div class="row">
                <div class="col-2">2 {{$fb -> calcDay2}}</div>
                <div class="col-2">{{$fb -> calcDayNum2}}</div>
                </div>

                <div class="row">
                <div class="col-2">3 {{$fb -> calcDay3}}</div>
                <div class="col-2">{{$fb -> calcDayNum3}}</div>
                </div>

                <div class="row">
                <div class="col-2">4 {{$fb -> calcDay4}}</div>
                <div class="col-2">{{$fb -> calcDayNum4}}</div>
                </div>

                <div class="row">
                <div class="col-2">5 {{$fb -> calcDay5}}</div>
                <div class="col-2">{{$fb -> calcDayNum5}}</div>
                </div>

                <div class="row">
                <div class="col-2">6 {{$fb -> calcDay6}}</div>
                <div class="col-2">{{$fb -> calcDayNum6}}</div>
                </div>

                <div class="row">
                <div class="col-2">7 {{$fb -> calcDay7}}</div>
                <div class="col-2">{{$fb -> calcDayNum7}}</div>
                </div>

            </div>
        </div>


        <form action="/webapps/foodbank/edit/{{$id}}" method="GET">
        <input type="submit" class="btn btn-primary" value="Edit Foodbank">
        @csrf
        </form>
    </div>
</section>


@endsection