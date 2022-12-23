<?php

    
namespace App\Http\Controllers;
    
use App\Models\Shift;
use Illuminate\Http\Request;
    
class ShiftController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:shift-list|shift-create|shift-edit|shift-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:shift-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:shift-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:shift-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shifts = Shift::latest()->paginate(5);
        return view('shifts.index',compact('shifts'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('shifts.create');
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
            
        ]);
    
        Shift::create($request->all());
    
        return redirect()->route('shifts.index')
                        ->with('success','Shift added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function show(Shift $shift)
    {
        return view('shifts.show',compact('shift'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function edit(Shift $shift)
    {
        return view('shifts.edit',compact('shift'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shift $shift)
    {
         request()->validate([
            'name' => 'required',
           
        ]);
    
        $shift->update($request->all());
    
        return redirect()->route('shifts.index')
                        ->with('success','Shift updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shift  $shift
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shift $shift)
    {
        $shift->delete();
    
        return redirect()->route('shifts.index')
                        ->with('success','Shift deleted successfully');
    }
}