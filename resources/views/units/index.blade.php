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
            <a class="btn btn-success" href="{{ route('units.create') }}"> Create New Unit</a>
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
            <th>Unit Name</th>
            <th>Unit Code</th>
            <th>Hours</th>
            {{-- <th>Status</th> --}}
            <th width="280px">Action</th>
        </tr>
	    @foreach ($units as $unit)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $unit->name }}</td>
	        <td>{{ $unit->code }}</td>
            <td>{{ $unit->hours }}</td>
            {{-- <td>{{ $unit->status }}</td> --}}
            <td>
                <a class="btn btn-info" href="{{ route('units.show',$unit->id) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('units.edit',$unit->id) }}">Edit</a>
                 {!! Form::open(['method' => 'DELETE','route' => ['units.destroy', $unit->id],'style'=>'display:inline']) !!}
                     {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                 {!! Form::close() !!}
             </td>
	    </tr>
	    @endforeach
    </table>


    {{-- {!! $units->links() !!} --}}



@endsection