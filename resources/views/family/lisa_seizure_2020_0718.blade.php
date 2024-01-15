@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">

    <!--  width="320" height="240" 
        <video autoplay controls >
        <source src="{{ asset('images/LisaSeizure_crop_2020_0718.mp4#t=10') }}" type="video/mp4" />
        <source src="{{ asset('images/LisaSeizure_crop_2020_0718.ogg') }}" type="video/ogg" />
        Your browser does not support the video tag.
        </video>
        -->
        <video autoplay="" controls="" preload="metadata" class="col-12 col-md-6">
        <source src="{{ asset('images/LisaSeizure_crop_2020_0718.mp4#t=270') }}" type="video/mp4" />
        <source src="{{ asset('images/LisaSeizure_crop_2020_0718.ogg#t=270') }}" type="video/ogg" />
        </video>

    </article>
</section>
@endsection


