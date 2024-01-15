@extends('layouts.dance')

@section('content')

    <article class="block2 card-body">

        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>
        
        <div id="alphabetFilter" class="">
            <a href="selectSong?filter=#">&nbsp;#&nbsp;</a>-<a href="selectSong?filter=A">&nbsp;A&nbsp;</a>-<a href="selectSong?filter=B">&nbsp;B&nbsp;</a>-<a href="selectSong?filter=C">&nbsp;C&nbsp;</a>-<a href="selectSong?filter=D">&nbsp;D&nbsp;</a>-
            <a href="selectSong?filter=E">&nbsp;E&nbsp;</a>-<a href="selectSong?filter=F">&nbsp;F&nbsp;</a>-<a href="selectSong?filter=G">&nbsp;G&nbsp;</a>-<a href="selectSong?filter=H">&nbsp;H&nbsp;</a>-<a href="selectSong?filter=I">&nbsp;I&nbsp;</a>-
            <a href="selectSong?filter=J">&nbsp;J&nbsp;</a>-<a href="selectSong?filter=K">&nbsp;K&nbsp;</a>-<a href="selectSong?filter=L">&nbsp;L&nbsp;</a>-<a href="selectSong?filter=M">&nbsp;M&nbsp;</a>-
            <a href="selectSong?filter=N">&nbsp;N&nbsp;</a>-<a href="selectSong?filter=O">&nbsp;O&nbsp;</a>-<a href="selectSong?filter=P">&nbsp;P&nbsp;</a>-<a href="selectSong?filter=Q">&nbsp;Q&nbsp;</a>-<a href="selectSong?filter=R">&nbsp;R&nbsp;</a>-<a href="selectSong?filter=S">&nbsp;S&nbsp;</a>-<a href="selectSong?filter=T">&nbsp;T&nbsp;</a>-<a href="selectSong?filter=U">&nbsp;U&nbsp;</a>-<a href="selectSong?filter=V">&nbsp;V&nbsp;</a>-<a href="selectSong?filter=W">&nbsp;W&nbsp;</a>-<a href="selectSong?filter=X">&nbsp;X&nbsp;</a>-<a href="selectSong?filter=Y">&nbsp;Y&nbsp;</a>-<a href="selectSong?filter=Z">&nbsp;Z </a>

        </div>        <br/>

        @foreach($songs as $song)
        <a href="createDance?id_song={{$song -> id}}">{{$song -> title}} / {{$song -> artist}}</a></br>
        @endforeach
     

    </article>

@endsection


