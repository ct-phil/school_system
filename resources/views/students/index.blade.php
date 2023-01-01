@extends('layouts.main')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Students</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>
            </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
           <h5 class="card-title">Students</h5>
           <table class="table table-striped">
              <thead>
                 <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name </th>
                    <th scope="col">Email</th>
                    <th scope="col">Date Registered</th>
                    <th scope="col">Regstration Number</th>
                    <th scope="col">Acceptance Status</th>
                    <th scope="col">Action</th>
                 </tr>
              </thead>
              <tbody>
                @foreach($students as $student)
                 <tr>
                    <th scope="row">{{ ++$i }}</th>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->created_at }}</td>
                    <td>{{ $student->studentDetail->reg_no ?? '' }}</td>
                    <td>@if ($student->acceptance == 1)
                        'accepted'
                    @elseif($student->acceptance == 0)
                        'pending'
                        @else
                        'denied'
                    @endif</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                         {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->id],'style'=>'display:inline']) !!}
                             {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                         {!! Form::close() !!}
                     </td>
                 </tr>
                @endforeach
              </tbody>

           </table>
           {{-- {!! $students->links() !!} --}}

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
	    @foreach ($students as $student)
	    <tr>
	        <td>{{ ++$i }}</td>
	        <td>{{ $student->course_name }}</td>
	        <td>{{ $student->course_code }}</td>
            <td>{{ $student->description }}</td>
            <td>{{ $student->course_status }}</td>
	        <td>
                <form action="{{ route('students.destroy',$student->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('students.show',$student->id) }}">Show</a>
                    @can('student-edit')
                    <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                    @endcan


                    @csrf
                    @method('DELETE')
                    @can('student-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>
 --}}

    


@endsection