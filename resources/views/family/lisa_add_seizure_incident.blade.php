@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
        <strong>Seizure Date, time and duration</strong>
        <p>

            <form action="AddIncident" method="POST"> <!--FoodBankCity-->
                <!--input type="text" name='city' value="{{ old('city') }}"-->
                <input type="text" class="text-input" placeholder="Date" name="i_date"/><br/>
                <input type="text" class="text-input" placeholder="Time" name="i_time"/><br/>
                <input type="text" class="text-input" placeholder="Duration" name="i_duration"/><br/>
                <input type="text" class="text-input" placeholder="Notes" name="i_notes"/><br/>
                <input type="text" class="text-input" placeholder="hlink" name="i_hlink"/><br/>
        
                <a class="btn btn-danger" href="/family">Cancel</a>
                <input type="submit" class="btn btn-primary" value="Save">
                @csrf
            </form>


        </p>

    </article>
</section>


@endsection


