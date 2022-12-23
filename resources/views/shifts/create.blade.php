@extends('layouts.main')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Shift</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('shifts.index') }}"> Back</a>
        </div>
    </div>
</div>


@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
       @foreach ($errors->all() as $error)
         <li>{{ $error }}</li>
       @endforeach
    </ul>
  </div>
@endif

<div class="card">
    <div class="card-body">
       <h5 class="card-title">Shifts Form</h5>
       <form class="row g-3" method="POST" action="{{ route('shifts.store') }}">
        @csrf
          <div class="col-12"> <label for="name" class="form-label">Name</label> <input type="text" class="form-control" name="name"></div>
          <div class="text-center"> <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-secondary">Reset</button></div>
       </form>
    </div>
 </div>

 
@endsection