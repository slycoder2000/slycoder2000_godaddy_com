
@extends('layouts.dance')

@section('content')


    <article class="block2 card-body">
        
        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>


        <form action="/webapps/dance/saveSong" method="GET">
            {{ csrf_field() }}
            <input type="text" name="title" size="50" placeholder="Title">
            <input type="text" name="artist" size = "25" placeholder="Artist">

            <button type="submit">Submit</button>
        </form>
     <br/>
        <div id="alphabetFilter" class="">
            <a href="addSong?filter=#">&nbsp;#&nbsp;</a>-<a href="addSong?filter=A">&nbsp;A&nbsp;</a>-<a href="addSong?filter=B">&nbsp;B&nbsp;</a>-<a href="addSong?filter=C">&nbsp;C&nbsp;</a>-<a href="addSong?filter=D">&nbsp;D&nbsp;</a>-
            <a href="addSong?filter=E">&nbsp;E&nbsp;</a>-<a href="addSong?filter=F">&nbsp;F&nbsp;</a>-<a href="addSong?filter=G">&nbsp;G&nbsp;</a>-<a href="addSong?filter=H">&nbsp;H&nbsp;</a>-<a href="addSong?filter=I">&nbsp;I&nbsp;</a>-
            <a href="addSong?filter=J">&nbsp;J&nbsp;</a>-<a href="addSong?filter=K">&nbsp;K&nbsp;</a>-<a href="addSong?filter=L">&nbsp;L&nbsp;</a>-<a href="addSong?filter=M">&nbsp;M&nbsp;</a>-
            <a href="addSong?filter=N">&nbsp;N&nbsp;</a>-<a href="addSong?filter=O">&nbsp;O&nbsp;</a>-<a href="addSong?filter=P">&nbsp;P&nbsp;</a>-<a href="addSong?filter=Q">&nbsp;Q&nbsp;</a>-<a href="addSong?filter=R">&nbsp;R&nbsp;</a>-<a href="addSong?filter=S">&nbsp;S&nbsp;</a>-<a href="addSong?filter=T">&nbsp;T&nbsp;</a>-<a href="addSong?filter=U">&nbsp;U&nbsp;</a>-<a href="addSong?filter=V">&nbsp;V&nbsp;</a>-<a href="addSong?filter=W">&nbsp;W&nbsp;</a>-<a href="addSong?filter=X">&nbsp;X&nbsp;</a>-<a href="addSong?filter=Y">&nbsp;Y&nbsp;</a>-<a href="addSong?filter=Z">&nbsp;Z </a>

        </div><br/>
        @foreach($songs as $song)
        {{$song -> title}} / {{$song -> artist}}</br>
        @endforeach

@endsection


