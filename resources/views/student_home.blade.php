@extends('layouts.student')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                  Dear {{ auth()->user()->name }} Your course {{ $applicatoinResponse->name. ' - ' .$applicatoinResponse->code }} is {{ auth()->user()->acceptance ==1 ? 'accepted' : 'Still Pending' }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
