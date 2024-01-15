@extends('layouts.dance')

@section('content')
@php
$setrose=0;
if(isset($_GET['rose'])) 
    $setrose=$_GET['rose'];
@endphp
<!-- testing -->
<div id="alphabetFilter" class="">

    <a href="/webapps/dance?rose={{$setrose}}&filter=#">&nbsp;#&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=A">&nbsp;A&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=B">&nbsp;B&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=C">&nbsp;C&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=D">&nbsp;D&nbsp;</a>-
    <a href="/webapps/dance?rose={{$setrose}}&filter=E">&nbsp;E&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=F">&nbsp;F&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=G">&nbsp;G&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=H">&nbsp;H&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=I">&nbsp;I&nbsp;</a>-
    <a href="/webapps/dance?rose={{$setrose}}&filter=J">&nbsp;J&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=K">&nbsp;K&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=L">&nbsp;L&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=M">&nbsp;M&nbsp;</a>-
    <a href="/webapps/dance?rose={{$setrose}}&filter=N">&nbsp;N&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=O">&nbsp;O&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=P">&nbsp;P&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=Q">&nbsp;Q&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=R">&nbsp;R&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=S">&nbsp;S&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=T">&nbsp;T&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=U">&nbsp;U&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=V">&nbsp;V&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=W">&nbsp;W&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=X">&nbsp;X&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=Y">&nbsp;Y&nbsp;</a>-<a href="/webapps/dance?rose={{$setrose}}&filter=Z">&nbsp;Z </a>

<div id='accordion' style="padding:10px 10px 10px 10px">


        @if(count($dances)<1)
            <div class="col">No data in table
            </div>
        @else

        @foreach($dances as $dance)


        <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading{{$dance -> id}}">
            <h5 class="panel-title">
                <a href='{{$dance -> stepsheet}}' target="_blank">
                    <img src="{{asset( $dance -> stepsheet === '' ? 'images/nosteps.png' : 'images/steps.png' )}}" height="20px">
                </a>

                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#faq{{$dance -> id}}" aria-expanded='false' aria-controls="faq{{$dance -> id}}">
                    &nbsp;&nbsp;{{$dance -> dance}}
                </a>
            </h5>
        </div>
        <div id="faq{{$dance -> id}}" class="panel-collapse collapse in bg-secondary text-white" style='padding-left:5px' role="tabpanel" aria-labelledby="heading{{$dance -> id}}">
            <div class="panel-body">

        @if($dance -> steps <> "")
            @php
            echo ($dance -> steps);
            echo ("<br/><br/>");
            @endphp
        @endif
        @php
        $songavailable=false;
        foreach($songs as $song) {
            if(strcmp($song->id, $dance->id)==0) {
                $songavailable=true;
            }
        };

if($songavailable) {
    echo ("<span class='btn-success'>&nbsp;&nbsp;SUGGESTED SONGS:&nbsp;&nbsp;</span><br/>");
    foreach($songs as $song) {
        if(strcmp($song->id, $dance->id)==0) {
            echo ($song->title . " / " . $song->artist . "<br/>");
        }
    }
}
@endphp
@guest
@else
    @if(Auth::user()->hasRole('SLY_ADMIN'))
        @if(request()->route()->uri == 'webapps/dance') 
            <a href="dance/createSong?id_dance={{$dance -> id}}&previousURL={{ request()->route()->uri }}?{{request()->getQueryString()}}" class="btn btn-primary"> ADD</a>
        @else
            <a href="createSong?id_dance={{$dance -> id}}&previousURL={{ request()->route()->uri }}?{{request()->getQueryString()}}" class="btn btn-primary"> ADD</a>
        @endif    
    @endif
@endguest
   


        <hr>
        <a href='{{$dance -> vid1}}' target='_blank' class='text-white bg-dark'>Video Tutorial</a>&nbsp;&nbsp;&nbsp; <a href='{{$dance -> stepsheet}}' target='_blank' class='text-white bg-dark'>View complete Stepsheet</a>
        
        @if(!empty($dance -> vid2))
        <br/><a href='{{$dance -> vid2}}' target='_blank' class='text-white bg-dark'>Video 2</a>
        @endif
        @if(!empty($dance -> vid3))
        <br/><a href='{{$dance -> vid3}}' target='_blank' class='text-white bg-dark'>Video 3</a>
        @endif

        <hr>
        
            </div>
        </div>
    </div>


        
        
        @endforeach

        {{$dances->appends(request()->input())->links('pagination::bootstrap-4')}}
       

        @endif
        </div>
    </div>

@endsection


