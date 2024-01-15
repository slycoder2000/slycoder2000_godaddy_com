@extends('layouts.dance')

@section('content')


    <article class="block2 card-body">
    
    @php
        $previousURL = 'webapps/dance/selectSong';
        if(isset($_GET['previousURL'])) {
            $previousURL = $_GET['previousURL'];
        }
    @endphp

        <a href="/{{$previousURL}}" class="btn-primary">&nbsp;&nbsp;Return to Song List&nbsp;&nbsp;</a>
        &nbsp;&nbsp;
        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>


        <form action="/webapps/dance/saveAllDances" method="GET">
            {{ csrf_field() }}
            <input type="hidden" name="song" value="{{request()->query('id_song')}}" />
            <input type="hidden" name="dancelist" id="dancelist" value="" />
        @foreach($dances as $dance)

        @php
        $danceChecked="";
        foreach($dance_songs as $ds){
            $danceChecked = $danceChecked . (strcmp($ds->id_dance, $dance->id) == 0 ? "checked" : "" );
            }
        
            
        @endphp

        <input type="checkbox" id="{{$dance -> id}}" value="{{$dance -> id}}" name="dance" {{ $danceChecked }} />&nbsp;{{$dance -> dance}}</br>
        @endforeach

        <button type="submit" name="submit" onclick="storeCheckboxes()">Save Dances</button>
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
        document.getElementById("dancelist").value=cb;

    }
    </script>

@endsection


