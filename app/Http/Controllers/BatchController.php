<?php

    
namespace App\Http\Controllers;
    

use App\Models\Batch;
use Illuminate\Http\Request;
    
class BatchController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // function __construct()
    // {
    //      $this->middleware('permission:batch-list|batch-create|batch-edit|batch-delete', ['only' => ['index','show']]);
    //      $this->middleware('permission:batch-create', ['only' => ['create','store']]);
    //      $this->middleware('permission:batch-edit', ['only' => ['edit','update']]);
    //      $this->middleware('permission:batch-delete', ['only' => ['destroy']]);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $batches = Batch::latest()->paginate(5);
        return view('batches.index',compact('batches'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('batches.create');
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
    
        Batch::create($request->all());
    
        return redirect()->route('batches.index')
                        ->with('success','Batch added successfully.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function show(Batch $batches)
    {
        return view('batches.show',compact('batch'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function edit(Batch $batch)
    {
        return view('batches.edit',compact('batch'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Batch $batch)
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
    
        $batch->update($request->all());
    
        return redirect()->route('batches.index')
                        ->with('success','Batch updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Batch  $batch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Batch $batch)
    {
        $batch->delete();
    
        return redirect()->route('batches.index')
                        ->with('success','Batch deleted successfully');
    }
}