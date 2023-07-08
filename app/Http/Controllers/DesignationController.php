<?php

namespace App\Http\Controllers;

use App\Http\Requests\DesignationStoreRequest;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $designations = Designation::all();
        if($request->has('search')){
            $designations = Designation::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('pages.designations.index', compact('designations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.designations.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DesignationStoreRequest $request)
    {
        Designation::create($request->validated());
        return redirect()->route('designations.index')->with('message', 'Designation Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Designation $designation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Designation $designation)
    {
        return view('pages.designations.edit', compact('designation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DesignationStoreRequest $request, Designation $designation)
    {
        $designation->update([
            'name' => $request->name
        ]);
        return redirect()->route('designations.index')->with('message', 'Designation Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Designation $designation)
    {
        $designation->delete();
        return redirect()->route('designations.index')->with('message', 'Designation Deleted Successfully!');
    }
}
