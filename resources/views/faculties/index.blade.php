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
            <a class="btn btn-success" href="{{ route('faculties.create') }}"> Create New Faculty</a>
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
            <th>Faculty Name</th>
            <th>Faculty Code</th>
            <th>Description</th>
            {{-- <th>Status</th> --}}
            <th width="280px">Action</th>
        </tr>
	    @foreach ($faculties as $faculty)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $faculty->name }}</td>
	        <td>{{ $faculty->code }}</td>
            <td>{{ $faculty->description }}</td>
            {{-- <td>{{ $faculty->status }}</td> --}}
            <td>
                <a class="btn btn-info" href="{{ route('faculties.show',$faculty->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('faculties.edit',$faculty->id) }}">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['faculties.destroy', $faculty->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
             </td>
	    </tr>
	    @endforeach
    </table>


    {{-- {!! $faculties->links() !!} --}}



@endsection