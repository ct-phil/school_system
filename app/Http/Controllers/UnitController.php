<?php

    
namespace App\Http\Controllers;
    
use App\Models\Unit;
use Illuminate\Http\Request;
    
class UnitController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:unit-list|unit-create|unit-edit|unit-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:unit-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:unit-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:unit-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::latest()->paginate(5);
        return view('units.index',compact('units'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('units.create');
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
    
        Unit::create($request->all());
    
        return redirect()->route('units.index')
                        ->with('success','Unit added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $units)
    {
        return view('units.show',compact('unit'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('units.edit',compact('unit'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
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
    
        $unit->update($request->all());
    
        return redirect()->route('units.index')
                        ->with('success','Unit updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();
    
        return redirect()->route('units.index')
                        ->with('success','Unit deleted successfully');
    }
}