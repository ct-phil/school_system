@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lecturers</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('lecturers.create') }}"> Create New Lecturer</a>
            </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
           <h5 class="card-title">Lecturers</h5>
           <table class="table table-striped">
              <thead>
                 <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Registered</th>
                    <th scope="col">Action</th>
                 </tr>
              </thead>
              <tbody>
                @foreach($lecturers as $lecturer)
                 <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $lecturer->name }}</td>
                    <td>{{ $lecturer->email }}</td>
                    <td>{{ $lecturer->created_at }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('lecturers.show',$lecturer->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('lecturers.edit',$lecturer->id) }}">Edit</a>
                         {!! Form::open(['method' => 'DELETE','route' => ['lecturers.destroy', $lecturer->id],'style'=>'display:inline']) !!}
                             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                         {!! Form::close() !!}
                     </td>
                 </tr>
                @endforeach
              </tbody>
           </table>
        </div>
     </div>

  


   



@endsection