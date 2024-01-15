@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
        <ul>
        <li><a href="/family/lisa">Lisa</a></li>
        <li>Carlos</li>
        <li>Aryanna</li>
        <li>Alyssa</li>
        <li>Animals</li>
            <ul>
            <li>Pazuzu</li>
            <li>Juliet</li>
            <li>Lady</li>
            <li>Rain</li>
            <li>Flickers</li>
            <li>Barn Swallows</li>
            </ul>

        </ul>
    </article>
</section>
@endsection


