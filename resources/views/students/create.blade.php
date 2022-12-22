@extends('layouts.main')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New Student</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('students.index') }}"> Back</a>
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
       <h5 class="card-title">Vertical Form</h5>
       <form class="row g-3" method="POST" action="{{ route('students.store') }}">
        @csrf
          <div class="col-12"> <label for="name" class="form-label">Name</label> <input type="text" class="form-control" name="name"></div>
          <div class="col-12"> <label for="email" class="form-label">Email</label> <input type="email" class="form-control" name="email"></div>
          {{-- <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div> --}}
        <div class="col-12"><input type="hidden" class="form-control" name="roles" value="Student"></div>
        <div class="col-12"><input type="hidden" class="form-control" name="account_type" value="3"></div>
          <div class="col-12"> <label for="password" class="form-label">Password</label> <input type="password" class="form-control" name="password"></div>
          <div class="col-12"> <label for="confirm-password" class="form-label">Confrim Password</label> <input type="password" class="form-control" name="confirm-password"></div>
          <div class="text-center"> <button type="submit" class="btn btn-primary">Submit</button> <button type="reset" class="btn btn-secondary">Reset</button></div>
       </form>
    </div>
 </div>

 {{-- <div class="col-md-8">
    <select id="inputState" class="form-select">
       <option selected="" placeholder="Email"></option>
       <option>...</option>
    </select>
 </div> --}}


{{-- {!! Form::open(array('route' => 'students.store','method'=>'POST')) !!}
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Password:</strong>
            {!! Form::password('password', array('placeholder' => 'Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Confirm Password:</strong>
            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
{!! Form::close() !!} --}}


@endsection