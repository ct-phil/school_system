@extends('layouts.main')


@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    {{-- @php( $students = \App\User::where('account_type', 3))
    @php( $lecturers = \App\User::where('account_type', 2))
    @php( $owners = \App\Course::all()) --}}


    <div class="row">
        <div class="col-xxl-4 col-md-6">
           <div class="card info-card sales-card">
             
              <div class="card-body">
                 <h5 class="card-title">Students </h5>
                 <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                    <div class="ps-3">
                       <h6>145</h6>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-xxl-4 col-md-6">
           <div class="card info-card revenue-card">
              
              <div class="card-body">
                 <h5 class="card-title">Lecturers </h5>
                 <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                    <div class="ps-3">
                       <h6>$3,264</h6>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        <div class="col-xxl-4 col-xl-12">
           <div class="card info-card customers-card">
            
              <div class="card-body">
                 <h5 class="card-title">Courses </h5>
                 <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center"> <i class="bi bi-people"></i></div>
                    <div class="ps-3">
                       <h6>1244</h6>
                    </div>
                 </div>
              </div>
           </div>
        </div>
        
     </div>

 @endsection