@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Batches</h2>
            </div>
            {{-- <div class="pull-right">
                @can('batch-create')
                <a class="btn btn-success" href="{{ route('batches.create') }}"> Create New Student</a>
                @endcan
            </div>
        </div> --}}\
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('batches.create') }}"> Create New Student</a>
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
	    @foreach ($batches as $batch)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $batch->course_name }}</td>
	        <td>{{ $batch->course_code }}</td>
            <td>{{ $batch->description }}</td>
            <td>{{ $batch->course_status }}</td>
	        <td>
                <form action="{{ route('batches.destroy',$batch->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('batches.show',$batch->id) }}">Show</a>
                    @can('batch-edit')
                    <a class="btn btn-primary" href="{{ route('batches.edit',$batch->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('batch-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>


    {!! $batches->links() !!}



@endsection