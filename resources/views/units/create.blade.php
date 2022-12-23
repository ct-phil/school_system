@extends('layouts.main')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Unit</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('units.index') }}"> Back</a>
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
       <h5 class="card-title">Units Form</h5>
       <form class="row g-3" method="POST" action="{{ route('units.store') }}">
        @csrf
          <div class="col-12"> <label for="name" class="form-label">Name</label> <input type="text" class="form-control" name="name"></div>
          <div class="col-12"> <label for="code" class="form-label">Code</label> <input type="text" class="form-control" name="code"></div>
          <div class="col-12"> <label for="hours" class="form-label">Hours</label> <input type="text" class="form-control" name="hours"></div>
          <div class="text-center"> <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-secondary">Reset</button></div>
       </form>
    </div>
 </div>

 
@endsection