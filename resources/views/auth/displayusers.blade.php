@extends('layouts.app')

@section('content')

<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
    <div class="row">

        @if(count($users)<1)
            <div class="col">No data in table
            </div>
        @else
        @foreach($users as $user)
        <div class="col-3">{{$user -> name}}</div> <div class="col-9">{{$user -> email}}</div>
        @endforeach

        @endif
        </div>
    </article>
</section>

@endsection