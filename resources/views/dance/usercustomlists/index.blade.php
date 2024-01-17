@extends('layouts.dance')

@section('content')

<h5>Save "{{$dance}}" to List(s)</h5>

<form method="GET" action="/webapps/dance/usercustomlists/store">

{{ csrf_field() }}
            <input type="hidden" name="id_dances" value="{{request('id_dance')}}" />
            <input type="hidden" name="customlists" id="customlists" value="" />
            @foreach($customlists as $customlist)

@php
        $listnameChecked="";
        
        foreach($customlists_dances as $cld){
            $listnameChecked = $listnameChecked . (strcmp($cld->id_customlists, $customlist->id) == 0 ? "checked" : "" );
            }
    
@endphp
<div class="row">
    <div class="col-9">
        <input type="checkbox" id="{{$customlist -> id}}" value="{{$customlist -> id}}" name="listname" {{ $listnameChecked }} />&nbsp;{{$customlist -> listname}}
    </div>
    <div class="col-3">
        [Edit]
    </div>
</div>
@endforeach
        <!-- <button type="submit" name="submit" onclick="storeCheckboxes()">Save Dances</button> -->


            <button class="btn btn-primary" onclick="storeCheckboxes()">Save Changes</button>
</form>
    <form method="POST" action="/webapps/dance/usercustomlists/create">
        @csrf
        @error('listname')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <div class="row no-gutters">
            <div class="col-10">
                <input type="text" class="form-control" id="listitem" name="listname" placeholder="New List: e.g. favorites"/>
            </div>
            <div class="col-2">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
        </div>

        </form>

 
@endsection



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
        document.getElementById("customlists").value=cb;

    }
    </script>