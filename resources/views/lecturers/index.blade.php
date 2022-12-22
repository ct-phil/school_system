@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lecturers</h2>
            </div>
            {{-- <div class="pull-right">
                @can('lecturer-create')
                <a class="btn btn-success" href="{{ route('lecturers.create') }}"> Create New Student</a>
                @endcan
            </div>
        </div> --}}\
        {{-- <div class="pull-right">
            <a class="btn btn-success" href="{{ route('lecturers.create') }}"> Create New Student</a>
        </div> --}}
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
                    <th scope="col">First Name</th>
                    <th scope="col">Surname</th>
                    <th scope="col">Date Registered</th>
                 </tr>
              </thead>
              <tbody>
                @foreach($lecturers as $lecturer)
                 <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $lecturer->first_name }}</td>
                    <td>{{ $lecturer->surname }}</td>
                    <td>{{ $lecturer->dateregistered }}</td>
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

  


    {{-- <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Description</th>
            <th>Description</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($lecturers as $lecturer)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $lecturer->course_name }}</td>
	        <td>{{ $lecturer->course_code }}</td>
            <td>{{ $lecturer->description }}</td>
            <td>{{ $lecturer->course_status }}</td>
	        <td>
                <form action="{{ route('lecturers.destroy',$lecturer->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('lecturers.show',$lecturer->id) }}">Show</a>
                    @can('lecturer-edit')
                    <a class="btn btn-primary" href="{{ route('lecturers.edit',$lecturer->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('lecturer-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
 --}}

    {{-- {!! $lecturers->links() !!} --}}



@endsection