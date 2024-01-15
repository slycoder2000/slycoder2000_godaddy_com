@extends('layouts.dance')

@section('content')

    <article class="block2 card-body">

        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>

        <div id="alphabetFilter" class="">
            <a href="selectDance?filter=#">&nbsp;#&nbsp;</a>-<a href="selectDance?filter=A">&nbsp;A&nbsp;</a>-<a href="selectDance?filter=B">&nbsp;B&nbsp;</a>-<a href="selectDance?filter=C">&nbsp;C&nbsp;</a>-<a href="selectDance?filter=D">&nbsp;D&nbsp;</a>-
            <a href="selectDance?filter=E">&nbsp;E&nbsp;</a>-<a href="selectDance?filter=F">&nbsp;F&nbsp;</a>-<a href="selectDance?filter=G">&nbsp;G&nbsp;</a>-<a href="selectDance?filter=H">&nbsp;H&nbsp;</a>-<a href="selectDance?filter=I">&nbsp;I&nbsp;</a>-
            <a href="selectDance?filter=J">&nbsp;J&nbsp;</a>-<a href="selectDance?filter=K">&nbsp;K&nbsp;</a>-<a href="selectDance?filter=L">&nbsp;L&nbsp;</a>-<a href="selectDance?filter=M">&nbsp;M&nbsp;</a>-
            <a href="selectDance?filter=N">&nbsp;N&nbsp;</a>-<a href="selectDance?filter=O">&nbsp;O&nbsp;</a>-<a href="selectDance?filter=P">&nbsp;P&nbsp;</a>-<a href="selectDance?filter=Q">&nbsp;Q&nbsp;</a>-<a href="selectDance?filter=R">&nbsp;R&nbsp;</a>-<a href="selectDance?filter=S">&nbsp;S&nbsp;</a>-<a href="selectDance?filter=T">&nbsp;T&nbsp;</a>-<a href="selectDance?filter=U">&nbsp;U&nbsp;</a>-<a href="selectDance?filter=V">&nbsp;V&nbsp;</a>-<a href="selectDance?filter=W">&nbsp;W&nbsp;</a>-<a href="selectDance?filter=X">&nbsp;X&nbsp;</a>-<a href="selectDance?filter=Y">&nbsp;Y&nbsp;</a>-<a href="selectDance?filter=Z">&nbsp;Z </a>

        </div>        <br/>

        @foreach($dances as $dance)
        <a href="createSong?id_dance={{$dance -> id}}">{{$dance -> dance}}</a></br>
        @endforeach
     

    </article>

@endsection


