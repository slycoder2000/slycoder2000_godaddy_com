@extends('layouts.app')

@section('content')


<section class="set1 card">
    <article class="block1 card-header">
        <h1 class="text-center">Food Banks</h1>
    </article>
    <div id="blockapp" class="card-body">


        @if(count($fbcs)>0)
        @php
        date_default_timezone_set("America/Denver");
        //echo date_default_timezone_get();
        $now = time();
        //$Override = mktime(0, 0, 0, date("m", $now)  , 26, date("Y", $now));
        //$today = getdate($Override);
        $today = getdate();
        //print_r($today);

        $fbStatus = "*** CLOSED ***";

        function getNumber($today) {
            $getNum = 0;
            //Count from 1 to today's number 
            // if dow = dow then add 1
            //first day of month
            $now = time();
    
            for($icount=1; $icount<=$today['mday']; $icount++) {
                $FirstDayOfMonth = mktime(0, 0, 0, date("m", $now)  , $icount, date("Y", $now));  
                $runningDate=getdate($FirstDayOfMonth);
                if($runningDate['weekday']==$today['weekday'])  $getNum++; 
                //echo($runningDate['weekday']);
    
            }

            //echo($getNum);

            return $getNum;
        }


        function checkStatus($today, $fbStatus, $calcDay, $calcDayNum) {
            if ($fbStatus == "*** OPEN ***") return "*** OPEN ***";
            if ($calcDay !== '' && $calcDayNum !== '') {
                if ($calcDay == $today['weekday'] && ($calcDayNum == "0" || $calcDayNum == getNumber($today))) {
                return "*** OPEN ***";
                }
            }
            return "*** Closed ***";
        }

        function checkAllStatus($today,$fb) {
            $fbStatus = "*** CLOSED ***";

            for($icount = 1; $icount<=7; $icount++) {
                $fbStatus=checkStatus($today, $fbStatus, $fb['calcDay'.$icount], $fb['calcDayNum'.$icount]); 
            } 
            return $fbStatus; 
        } 



        //echo($today['weekday']); 
        @endphp
        @foreach($fbcs as $fbc) 
        @php $fbc_nospace=str_replace(' ','',$fbc -> city);
        @endphp

        <section id='{{$fbc_nospace}}'>
            <div>
                <div class='container'>
                    <h2><button type='button' data-toggle='collapse' data-target='#collapse{{$fbc_nospace}}'
                            aria-expanded='true' aria-controls='collapse{{$fbc_nospace}}'>
                            {{$fbc -> city}}</button></h2>
                    <div id='collapse{{$fbc_nospace}}' class='card-deck collapse hide' aria-labelledby='headingOne'
                        data-parent='#{{$fbc_nospace}}'>

                        @if(count($fbs)>0)

                        @foreach($fbs as $fb)
                        @if($fb['cityref']==$fbc['city'])
                        <div class='card' style='min-width:12rem; margin-bottom:40px;' >
                            <div class='card-body'>
                                <h5 class='card-title'>{{$fb -> name}}</h5><br>
                                {{$fb -> phone}}<br>
                                @php
                                echo("<a href='https://www.google.com/maps/place/");
        
                                echo(urlencode($fb -> address));
                                
                                echo("' target='_new'>");
                                $fbStatus= checkAllStatus($today, $fb);
                                @endphp {{$fb -> address}}
                                @if(isset($fb -> address2))</br>{{$fb -> address2}}
                                @endif </a></br>

                                {{$fb -> days}}<br>
                                {{$fb -> starttime}} - {{$fb -> endtime}}<br>

                                @if($fbStatus=='*** OPEN ***')
                                    <span class='alert-success'>
                                @else
                                    <span class='text-danger'>
                                @endif
        
                                {{$fbStatus}}</span>

                            </div>
                        </div>
                        @endif
                        @endforeach

                        @endif
                    </div>

                </div>
            </div>
</section>
@endforeach
@endif


</div>
</section>


@endsection