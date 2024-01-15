@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
            <welcome-component></welcome-component>
            <div class="d-md-none">&nbsp;</div>
            <div class="col-md-6 d-md-flex ml-md-n3">
		<div class="flex-fill mr-md-n3" id="ServicesBlock">
			Services
			<ul>
                <li>Software Engineering</li>
                <li>Web Development</li>
                <li>Computer Repair and Upgrades</li>
                <li>Video Conversion</li>
                <li>Professional Consulting & Tutoring</li>
			</ul>
		</div>
	</div>
    </div>
</div>
@endsection


