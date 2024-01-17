@extends('layouts.dance')

@section('content')
@php
$id=$customid;
@endphp

<div id="alphabetFilter" class="">

    <a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=#">&nbsp;#&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=A">&nbsp;A&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=B">&nbsp;B&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=C">&nbsp;C&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=D">&nbsp;D&nbsp;</a>-
    <a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=E">&nbsp;E&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=F">&nbsp;F&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=G">&nbsp;G&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=H">&nbsp;H&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=I">&nbsp;I&nbsp;</a>-
    <a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=J">&nbsp;J&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=K">&nbsp;K&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=L">&nbsp;L&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=M">&nbsp;M&nbsp;</a>-
    <a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=N">&nbsp;N&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=O">&nbsp;O&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=P">&nbsp;P&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=Q">&nbsp;Q&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=R">&nbsp;R&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=S">&nbsp;S&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=T">&nbsp;T&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=U">&nbsp;U&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=V">&nbsp;V&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=W">&nbsp;W&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=X">&nbsp;X&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=Y">&nbsp;Y&nbsp;</a>-<a href="/webapps/dance/usercustomlists/show/{{$id}}?filter=Z">&nbsp;Z </a>

<div id='accordion' style="padding:10px 10px 10px 10px">


        @if(count($dances)<1)
            <div class="col">No data in table
            </div>
        @else

        @foreach($dances as $dance)


        <div class="panel panel-default">
        <div class="panel-heading row" role="tab" id="heading{{$dance -> id}}">
            <div class="col-sm-9">
            <h5 class="panel-title">
                <a href='{{$dance -> stepsheet}}' target="_blank">
                    <img src="{{asset( $dance -> stepsheet === '' ? 'images/nosteps.png' : 'images/steps.png' )}}" height="20px">
                </a>

                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#faq{{$dance -> id}}" aria-expanded='false' aria-controls="faq{{$dance -> id}}">
                    &nbsp;&nbsp;{{$dance -> dance}}
                </a>
            </h5>
            </div>
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
@auth
    @if(Auth::user()->hasRole('SLY_ADMIN'))
        @if(request()->route()->uri == 'webapps/dance') 
            <a href="dance/createSong?id_dance={{$dance -> id}}&previousURL={{ request()->route()->uri }}?{{request()->getQueryString()}}" class="btn btn-primary"> ADD</a>
        @else
            <a href="createSong?id_dance={{$dance -> id}}&previousURL={{ request()->route()->uri }}?{{request()->getQueryString()}}" class="btn btn-primary"> ADD</a>
        @endif    
    @endif
@endauth
   


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


