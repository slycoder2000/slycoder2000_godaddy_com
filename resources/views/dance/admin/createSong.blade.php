@extends('layouts.dance')

@section('content')


    <article class="block2 card-body">
        
    @php
        $previousURL = 'webapps/dance/selectDance';
        if(isset($_GET['previousURL'])) {
            $previousURL = $_GET['previousURL'];
        }
    @endphp

        <a href="/{{$previousURL}}" class="btn-primary">&nbsp;&nbsp;Return to Dance List&nbsp;&nbsp;</a>
        &nbsp;&nbsp;
        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>


        <form action="/webapps/dance/saveSong" method="GET">
            {{ csrf_field() }}
            <input type="text" name="title" size="50" placeholder="Title">
            <input type="text" name="artist" size = "25" placeholder="Artist">

            <button type="submit">Submit</button>
        </form>
     



        <form action="/webapps/dance/saveAllSongs" method="GET">
            {{ csrf_field() }}
            <input type="hidden" name="dance" value="{{request()->query('id_dance')}}" />
            <input type="hidden" name="songlist" id="songlist" value="" />
        @foreach($songs as $song)

        @php
        $songChecked="";
        foreach($dance_songs as $ds){
            $songChecked = $songChecked . (strcmp($ds->id_song, $song->id) == 0 ? "checked" : "" );
            }
        
            
        @endphp

        <input type="checkbox" id="{{$song -> id}}" value="{{$song -> id}}" name="song" {{ $songChecked }} />&nbsp;{{$song -> title}} / {{$song -> artist}}</br>
        @endforeach

        <button type="submit" name="submit" onclick="storeCheckboxes()">Save Songs</button>
        </form>

    </br>
</br>

    </article>


<script text="javascript">

    function storeCheckboxes() {

        //var array = [];
        var cb = "";
        //document.forms[1].songlist.value="";
        var checkboxes = document.querySelectorAll('input[type=checkbox]:checked');
        for (var i = 0; i < checkboxes.length; i++) {
            //array.push(checkboxes[i].value);
            cb+=checkboxes[i].value 
            if(i < checkboxes.length-1) cb+= ",";
        }
        document.getElementById("songlist").value=cb;

    }
    </script>

@endsection


