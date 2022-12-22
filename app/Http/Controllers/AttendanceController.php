<?php

    
namespace App\Http\Controllers;
    
use App\Models\Attendance;
use Illuminate\Http\Request;
    
class AttendanceController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:attendance-list|attendance-create|attendance-edit|attendance-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:attendance-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:attendance-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:attendance-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $attendances = Attendance::latest()->paginate(5);
        return view('attendances.index',compact('attendances'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('attendances.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'surname' => 'required',
            'father_name' => 'required',
            'father_phone' => 'required',
            'mother_name' => 'required',
            'mother_phone' => 'required',
            'sex' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'nationality' => 'required',
        ]);
    
        Attendance::create($request->all());
    
        return redirect()->route('attendances.index')
                        ->with('success','Attendance added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show(Attendance $attendances)
    {
        return view('attendances.show',compact('attendance'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        return view('attendances.edit',compact('attendance'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Attendance $attendance)
    {
         request()->validate([
            'first_name' => 'required',
            'middle_name' => 'required',
            'surname' => 'required',
            'father_name' => 'required',
            'father_phone' => 'required',
            'mother_name' => 'required',
            'mother_phone' => 'required',
            'sex' => 'required',
            'email' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'nationality' => 'required',
        ]);
    
        $attendance->update($request->all());
    
        return redirect()->route('attendances.index')
                        ->with('success','Attendance updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
    
        return redirect()->route('attendances.index')
                        ->with('success','Attendance deleted successfully');
    }
}