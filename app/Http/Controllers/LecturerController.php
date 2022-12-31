<?php

    
namespace App\Http\Controllers;
    
use App\Models\Lecturer;
use App\Models\User;
use Illuminate\Http\Request;
    
class LecturerController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:lecturer-list|lecturer-create|lecturer-edit|lecturer-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:lecturer-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:lecturer-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:lecturer-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lecturers = User::where('account_type', 2)->latest()->paginate(5);
        return view('lecturers.index',compact('lecturers'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('lecturers.create');
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
    
        return redirect()->route('lecturers.index')
                        ->with('success','Lecturer added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function show(Lecturer $lecturers)
    {
        return view('lecturers.show',compact('lecturer'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $lecturer = User::find($id);
        return view('lecturers.edit',compact('lecturer'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   
        // dd($request->all());
        $lecturer = User::find($id);
         request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$lecturer->id,
            'password' => 'required|same:confirm-password',
            'roles' => 'nullable',
            
        ]);
    
        $lecturer->update($request->all());
    
        return redirect()->route('lecturers.index')
                        ->with('success','Lecturer updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Lecturer  $lecturer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecturer $lecturer)
    {
        $lecturer->delete();
    
        return redirect()->route('lecturers.index')
                        ->with('success','Lecturer deleted successfully');
    }
}