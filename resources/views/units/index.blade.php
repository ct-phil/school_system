@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Units</h2>
            </div>
            {{-- <div class="pull-right">
                @can('unit-create')
                <a class="btn btn-success" href="{{ route('units.create') }}"> Create New Student</a>
                @endcan
            </div>
        </div> --}}\
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('units.create') }}"> Create New Student</a>
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
	    @foreach ($units as $unit)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $unit->course_name }}</td>
	        <td>{{ $unit->course_code }}</td>
            <td>{{ $unit->description }}</td>
            <td>{{ $unit->course_status }}</td>
	        <td>
                <form action="{{ route('units.destroy',$unit->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('units.show',$unit->id) }}">Show</a>
                    @can('unit-edit')
                    <a class="btn btn-primary" href="{{ route('units.edit',$unit->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('unit-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $units->links() !!}



@endsection