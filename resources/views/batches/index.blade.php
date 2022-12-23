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
            <a class="btn btn-success" href="{{ route('batches.create') }}"> Create New Batch</a>
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
            <th>Batch Name</th>
            <th width="280px">Action</th>
        </tr>
	    @foreach ($batches as $batch)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $batch->name }}</td>
            <td>
                <a class="btn btn-info" href="{{ route('batches.show',$batch->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('batches.edit',$batch->id) }}">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['batches.destroy', $batch->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
             </td>
	    </tr>
	    @endforeach
    </table>


    {!! $batches->links() !!}



@endsection