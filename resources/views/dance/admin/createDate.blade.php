@extends('layouts.dance')

@section('content')
    <article class="block2 card-body">
        
        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>
        
        <form action="/webapps/dance/saveDate">
            {{ csrf_field() }}
            <input type="date" name="dance_date" placeholder="Date">
            <select name="id_dance">
                @foreach($dances as $dance)
                <option value="{{$dance -> id}}">{{$dance -> dance}}</option>
                @endforeach
            </select>
            <button type="submit">Submit</button>
        </form>
     


    </article>

@endsection


