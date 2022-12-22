<?php

    
namespace App\Http\Controllers;
    
use App\Models\Faculty;
use Illuminate\Http\Request;
    
class FacultyController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:faculty-list|faculty-create|faculty-edit|faculty-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:faculty-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:faculty-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:faculty-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faculties = Faculty::latest()->paginate(5);
        return view('faculties.index',compact('faculties'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('faculties.create');
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
    
        Faculty::create($request->all());
    
        return redirect()->route('faculties.index')
                        ->with('success','Faculty added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(Faculty $faculties)
    {
        return view('faculties.show',compact('faculty'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(Faculty $faculty)
    {
        return view('faculties.edit',compact('faculty'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Faculty $faculty)
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
    
        $faculty->update($request->all());
    
        return redirect()->route('faculties.index')
                        ->with('success','Faculty updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        $faculty->delete();
    
        return redirect()->route('faculties.index')
                        ->with('success','Faculty deleted successfully');
    }
}