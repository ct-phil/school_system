@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Attendances</h2>
            </div>
            {{-- <div class="pull-right">
                @can('attendance-create')
                <a class="btn btn-success" href="{{ route('attendances.create') }}"> Create New Student</a>
                @endcan
            </div>
        </div> --}}\
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('attendances.create') }}"> Create New Student</a>
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
	    @foreach ($attendances as $attendance)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $attendance->course_name }}</td>
	        <td>{{ $attendance->course_code }}</td>
            <td>{{ $attendance->description }}</td>
            <td>{{ $attendance->course_status }}</td>
	        <td>
                <form action="{{ route('attendances.destroy',$attendance->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('attendances.show',$attendance->id) }}">Show</a>
                    @can('attendance-edit')
                    <a class="btn btn-primary" href="{{ route('attendances.edit',$attendance->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('attendance-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $attendances->links() !!}



@endsection