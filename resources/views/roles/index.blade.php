@extends('layouts.main')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Role Management</h2>
        </div>
       
    </div>
</div>


@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <div class="row">
       <h5 class="card-title col-8">Table with hoverable rows</h5>
    
        @can('role-create')
            <a class="btn btn-primary btn-sm col-4 float-right mt-2" href="{{ route('roles.create') }}" > Create New Role</a>
            @endcan
        </div>
       <table class="table table-hover">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th width="280px">Action</th>
         </tr>
           @foreach ($roles as $key => $role)
           <tr>
               <td>{{ ++$i }}</td>
               <td>{{ $role->name }}</td>
               <td>
                   <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
                   @can('role-edit')
                       <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
                   @endcan
                   @can('role-delete')
                       {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                           {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                       {!! Form::close() !!}
                   @endcan
               </td>
           </tr>
           @endforeach
            
       </table>
    </div>
 </div>

{{-- <table class="table table-bordered">
  <tr>
     <th>No</th>
     <th>Name</th>
     <th width="280px">Action</th>
  </tr>
    @foreach ($roles as $key => $role)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $role->name }}</td>
        <td>
            <a class="btn btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>
            @can('role-edit')
                <a class="btn btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a>
            @endcan
            @can('role-delete')
                {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                {!! Form::close() !!}
            @endcan
        </td>
    </tr>
    @endforeach
</table> --}}


{!! $roles->render() !!}


@endsection