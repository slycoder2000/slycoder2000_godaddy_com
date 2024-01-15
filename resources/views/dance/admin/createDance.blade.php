@extends('layouts.dance')

@section('content')
    <article class="block2 card-body">

        <a href="/admin" class="btn-primary">&nbsp;&nbsp;Return to Admin Menu&nbsp;&nbsp;</a>
        <br/><br/>
        
        <form action="/webapps/dance/saveDance">
            {{ csrf_field() }}
            
            <input type="text" name="dance" value="" size="50" placeholder="Dance" autofocus><br>
            Choreographed by:<br>
            <input type="text" name="choreo" value=""><br>
            Contributed by:<br>
            <input type="text" name="contrib" value=""><br>
            Rose Favorite:<br> 
            <input type="checkbox" name="rosefav" value="rosefav"><br>
            StepSheet:<br>
            <input type="text" name="stepsheet" value=""><br>
            Vid 1:<br>
            <input type="text" name="vid1" value=""><br>
            Vid 2:<br>
            <input type="text" name="vid2" value=""><br>
            Vid 3:<br>
            <input type="text" name="vid3" value=""><br>
            {{-- hlink:<br>
            <input type="text" name="hlink" value=""><br> --}}
            <label for="steps">steps:</label><br>

            <textarea id="steps" name="steps" rows="8" cols="50"></textarea>
          <br>


            <button type="submit">Submit</button>
        </form>
     


    </article>
@endsection


