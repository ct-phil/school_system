<?php

    
namespace App\Http\Controllers;
    

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Mail\AcceptanceLetter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class StudentController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:student-list|student-create|student-edit|student-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:student-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:student-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:student-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('account_type', 3)->latest()->paginate(30);
        return view('students.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create');
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
           'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'nullable',
            'account_type' => 'required'
        ]);

        User::create($request->all());
    
        return redirect()->route('students.index')
                        ->with('success','Student added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(User $students)
    {
        return view('students.show',compact('student'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $student = User::find($id);
        return view('students.edit',compact('student'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // dd($request->all());
        $student = User::find($id);
         request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$student->id,
            'password' => 'required|same:confirm-password',
            'roles' => 'nullable',
            
        ]);


    
        $student->update($request->all());
    
        return redirect()->route('students.index')
                        ->with('success','Student updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();
    
        return redirect()->route('students.index')
                        ->with('success','Student deleted successfully');
    }

    public function respond($id){

        $student = User::find($id);
        return view('students.respond', compact('student'));
    }

    public function respondUpdate( Request $request, $id)
    {
        $student = User::find($id);
        if($request->has('accept')){
            $student->acceptance = $request->accept;
            $student->update();

            Mail::send(new AcceptanceLetter($student));

        }
       

        return redirect()->route('students.index');
    }
}