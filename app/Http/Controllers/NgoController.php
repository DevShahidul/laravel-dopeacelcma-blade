<?php

namespace App\Http\Controllers;

use App\Http\Requests\NgoStoreRequest;
use App\Models\Ngo;
use Illuminate\Http\Request;

class NgoController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ngos = Ngo::all();
        return view('pages.ngo.index', compact('ngos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.ngo.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NgoStoreRequest $request)
    {
        Ngo::create([
            'name' => $request->name, 
            'country_id' => $request->country_id,
            'state_id' => $request->state_id, 
            'city_id' => $request->city_id, 
            'zip_code' => $request->zip_code,
            'address' => $request->address
        ]);

        return redirect()->route('ngo.index')->with('message', 'Ngo created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
