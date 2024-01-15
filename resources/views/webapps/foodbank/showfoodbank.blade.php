@extends('layouts.app')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">

        @if(count($fbs)>0)
      
        
        <ul>
        @foreach($fbs as $fb)
            <li><a href='/webapps/foodbank/show/{{$fb->id}}'>{{$fb->cityref}} - {{$fb -> name}}</a></li>
        @endforeach
        </ul>
       {{$fbs->links()}}
        @endif

        <form action="/webapps/foodbank/addfoodbank" method="GET">
        <input type="submit" class="btn btn-primary" value="Add Foodbank">
        @csrf
        </form>
    </div>
</section>


@endsection