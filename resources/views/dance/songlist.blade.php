@extends('layouts.dance')

@section('content')
<div id="alphabetFilter" class="">
    <a href="songlist?filter=#">&nbsp;#&nbsp;</a>-<a href="songlist?filter=A">&nbsp;A&nbsp;</a>-<a href="songlist?filter=B">&nbsp;B&nbsp;</a>-<a href="songlist?filter=C">&nbsp;C&nbsp;</a>-<a href="songlist?filter=D">&nbsp;D&nbsp;</a>-
    <a href="songlist?filter=E">&nbsp;E&nbsp;</a>-<a href="songlist?filter=F">&nbsp;F&nbsp;</a>-<a href="songlist?filter=G">&nbsp;G&nbsp;</a>-<a href="songlist?filter=H">&nbsp;H&nbsp;</a>-<a href="songlist?filter=I">&nbsp;I&nbsp;</a>-
    <a href="songlist?filter=J">&nbsp;J&nbsp;</a>-<a href="songlist?filter=K">&nbsp;K&nbsp;</a>-<a href="songlist?filter=L">&nbsp;L&nbsp;</a>-<a href="songlist?filter=M">&nbsp;M&nbsp;</a>-
    <a href="songlist?filter=N">&nbsp;N&nbsp;</a>-<a href="songlist?filter=O">&nbsp;O&nbsp;</a>-<a href="songlist?filter=P">&nbsp;P&nbsp;</a>-<a href="songlist?filter=Q">&nbsp;Q&nbsp;</a>-<a href="songlist?filter=R">&nbsp;R&nbsp;</a>-<a href="songlist?filter=S">&nbsp;S&nbsp;</a>-<a href="songlist?filter=T">&nbsp;T&nbsp;</a>-<a href="songlist?filter=U">&nbsp;U&nbsp;</a>-<a href="songlist?filter=V">&nbsp;V&nbsp;</a>-<a href="songlist?filter=W">&nbsp;W&nbsp;</a>-<a href="songlist?filter=X">&nbsp;X&nbsp;</a>-<a href="songlist?filter=Y">&nbsp;Y&nbsp;</a>-<a href="songlist?filter=Z">&nbsp;Z </a>

</div>
    <div id='accordion' >

        @if(count($songs)<1)
            <div class="col">No data in table
            </div>
        @else

        @php
            $prevsong="";
            $songlink="";
        @endphp
        @foreach($songs as $song)

        @if (strcmp($prevsong, $song->title . $song->artist) != 0)
        
        <div class="panel panel-default" >
            <div class="panel-heading col-lg-12" role="tab" id="heading{{$song -> id}}">
                <h6 style="padding:0px 0px 0px 0px; line-height:.7;">
                    <hr>
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#faq{{$song -> id}}" aria-expanded='false' aria-controls="faq{{$song -> id}}">
                        <strong>{{$song -> title}}</strong>
                        <span class='d-none d-md-inline d-lg-inline d-xl-inline'> / {{$song -> artist}}</span>
                    </a>
                    
                </h6>
            </div>  
            
            <div id="faq{{$song -> id}}" class="panel-collapse collapse in bg-secondary text-white" style='padding-left:5px' role="tabpanel" aria-labelledby="heading{{$song -> id}}">
            <div class="panel-body">
                {{$song -> artist}}<br/>
                <a href="https://www.youtube.com/results?search_query={{$song -> title}} {{$song -> artist}}" target="_blank" style="color:#fff;background-color:#ff0000">Youtube Search
                </a>
            </div>
            
        </div>
        @guest
                @else
                    @if(Auth::user()->hasRole('SLY_ADMIN'))
                        <a href="createDance?id_song={{$song -> id}}&previousURL=webapps/dance/songlist" class="btn btn-primary"> ADD</a>
                    @endif
                @endguest
        @endif

        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-*">
                <h4>

                @if(!empty($song->dance)) 
                @php
                    $songlink=str_replace(' ','+',$song->dance)
                @endphp
                <a href="search?search={{$songlink}}">
                {{$song -> dance}} 
                </a>
                    @if($song->rosefav==1)
                    🐻🌹
                    @endif
                @endif

            </h4>

            </div>
        </div>



        @if (strcmp($prevsong, $song->title . $song->artist) != 0)

    </div>

    @endif

        @php
            $prevsong=$song->title . $song->artist;    
        @endphp
            
        @endforeach

        
        @endif


        </div>
    </div>

@endsection


