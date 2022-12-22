@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Lecturer</h2>
            </div>
            {{-- <div class="pull-right">
                @can('lecturer-create')
                <a class="btn btn-success" href="{{ route('lecturers.create') }}"> Create New Lecturer</a>
                @endcan
            </div>
        </div> --}}\
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('lecturers.create') }}"> Create New Lecturer</a>
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


    {!! $lecturers->links() !!}



@endsection