@extends('layouts.main')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Create New User</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
       <form class="row g-3" method="POST" action="{{ route('users.store') }}">
        @csrf
          <div class="col-12"> <label for="name" class="form-label">Name</label> <input type="text" class="form-control" name="name"></div>
          <div class="col-12"> <label for="email" class="form-label">Email</label> <input type="email" class="form-control" name="email"></div>
          <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <label for="role" class="form-label">Role</label>
                {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
            </div>
        </div>
          <div class="col-12">
            <label for="inputState" class="form-label">Account Type</label> 
            <select name="account_type" class="form-select">
               <option value="">Choose...</option>
               <option value="1">Admin</option>
               <option value="2">Lecturer</option>
               <option value="3">Student</option>
            </select>
         </div>
          <div class="col-12"> <label for="password" class="form-label">Password</label> <input type="password" class="form-control" name="password"></div>
          <div class="col-12"> <label for="inputPassword4" class="form-label">Confrim Password</label> <input type="password" class="form-control" name="confirm-password"></div>
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


{{-- {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
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