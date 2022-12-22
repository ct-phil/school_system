@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Faculties</h2>
            </div>
            {{-- <div class="pull-right">
                @can('faculty-create')
                <a class="btn btn-success" href="{{ route('faculties.create') }}"> Create New Student</a>
                @endcan
            </div>
        </div> --}}\
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('faculties.create') }}"> Create New Student</a>
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
	    @foreach ($faculties as $faculty)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $faculty->course_name }}</td>
	        <td>{{ $faculty->course_code }}</td>
            <td>{{ $faculty->description }}</td>
            <td>{{ $faculty->course_status }}</td>
	        <td>
                <form action="{{ route('faculties.destroy',$faculty->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('faculties.show',$faculty->id) }}">Show</a>
                    @can('faculty-edit')
                    <a class="btn btn-primary" href="{{ route('faculties.edit',$faculty->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('faculty-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $faculties->links() !!}



@endsection