@extends('layouts.app')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">

        <form action="FoodBankCity" method="POST">
            <input type="text" name='city' value="{{ old('city') }}">
            <input type="submit" class="btn btn-primary" value="Add City">
            <div class="text-danger">
                {{ $errors -> first('city') }}
            </div>
            @csrf
        </form>


        @if(count($cities)>0)
        <ul>
            @foreach($cities as $city)
            <li>{{$city -> city}}</li>
            @endforeach
        </ul>
        @endif
    </div>
</section>


@endsection