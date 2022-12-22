@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Courses</h2>
            </div>
            {{-- <div class="pull-right">
                @can('course-create')
                <a class="btn btn-success" href="{{ route('courses.create') }}"> Create New Course</a>
                @endcan
            </div>
        </div> --}}\
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('courses.create') }}"> Create New Course</a>
        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif


    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Course Name</th>
            <th>Course Code</th>
            <th>Description</th>
            {{-- <th>Status</th> --}}
            <th width="280px">Action</th>
        </tr>
	    @foreach ($courses as $course)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $course->name }}</td>
	        <td>{{ $course->code }}</td>
            <td>{{ $course->description }}</td>
            {{-- <td>{{ $course->status }}</td> --}}
            <td>
                <a class="btn btn-info" href="{{ route('courses.show',$course->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('courses.edit',$course->id) }}">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['courses.destroy', $course->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
             </td>
	    </tr>
	    @endforeach
    </table>


    {!! $courses->links() !!}



@endsection