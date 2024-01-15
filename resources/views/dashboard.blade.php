@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    <div>Logged in</div>

                    @if(Auth::user()->hasRole('SLY_ADMIN'))

                    <div>Admin Logged in</div>
                    @endif
                    @if(Auth::user()->hasRole('SLY_SUPERADMIN'))

                    <div>Super Admin Logged in</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
