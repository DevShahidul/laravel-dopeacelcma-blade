<?php

namespace App\Http\Controllers;

use App\Http\Requests\NgoStoreRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Ngo;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class NgoController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ngos = Ngo::all();
        if($request->has('search')){
            $ngos = Ngo::where('name', 'like', "%{$request->search}%")->get();
        }
        return view('pages.ngos.index', compact('ngos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('pages.ngos.create', compact(['countries', 'states', 'cities']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(NgoStoreRequest $request)
    {
        Ngo::create($request->validated());

        return redirect()->route('ngos.index')->with('message', 'Ngo created successfully!');
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
    public function edit(Ngo $ngo): View
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        return view('pages.ngos.edit', compact(['ngo', 'countries', 'states', 'cities']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(NgoStoreRequest $request, Ngo $ngo)
    {
        $ngo->update([
            'name' => $request->name, 
            'country_id' => $request->country_id,
            'state_id' => $request->state_id, 
            'city_id' => $request->city_id, 
            'zip_code' => $request->zip_code,
            'address' => $request->address
        ]);
        return redirect()->route('ngos.index')->with('message', 'Ngo Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ngo $ngo)
    {
        $ngo->delete();
        return redirect()->route('ngos.index')->with('message', 'Ngo updated successfully!');
    }
}
