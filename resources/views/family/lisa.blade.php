@extends('layouts.app')

@section('content')
<section class="set1 card">
    <article class="block1 card-header">
        <h1>{{$title}}</h1>
    </article>

    <article class="block2 card-body">
    <h2>Medical</h2>
        
        <h3> Seizure record 
            @guest
            @else
            @if(Auth::user()->hasRole('SLY_SUPERADMIN'))
            <a class="btn btn-primary" href="/family/lisa_add_seizure_incident"> Add incident date and time  </a>
            @endif
            @endguest
        </h3>  


            @php
                $oldincident="";
                foreach ($incidents as $incident) {
                
                    $incidentdate=$incident->date;
                    if($oldincident!="") {

                        $origin = new DateTime($oldincident);
                        $target = new DateTime($incidentdate);
                        $interval = $origin->diff($target);

                        echo $interval->format('%R%a days') . "<br/>";
                        if($origin->format("Y")!=$target->format("Y")) echo "<hr/>";
                    }
                    echo $incidentdate . " ";
                    echo date("l", strtotime($incidentdate));

                    if($incident -> time != NULL) {
                        echo " @ " . $incident -> time ;
                    }
                    
                    if($incident -> hlink != NULL) {
                        echo "<a href='" . $incident -> hlink ."' target='_blank'>";
                            echo " [video] ";
                        echo "</a>";

                    }

                    if($incident -> notes != NULL) {
                        echo " - " . $incident -> notes ;
                    }

                    echo "<br/>";

                    $oldincident = $incidentdate;
        
                }
            @endphp

</article>
</section>
@endsection


