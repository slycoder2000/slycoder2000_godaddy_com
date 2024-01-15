@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
        <p>Carlos Ramirez</p>
        <p>Cell: <a href="tel:720-364-8011">(720) 364-8011</a></p>
        <p>e&#8209;mail:&nbsp;<a href='mailto:sly@slycoder.com'>Sly@SlyCoder.com</a></p>

    </article>
</section>

@endsection