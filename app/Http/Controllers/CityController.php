<?php

namespace App\Http\Controllers;

use App\Http\Requests\CityStoreRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $cities = City::all();
        return view('pages.cities.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $states = State::all();
        return view('pages.cities.create', compact(['states']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CityStoreRequest $request)
    {
        City::create($request->validated());
        return redirect()->route('cities.index')->with('message', 'City created successfully');
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
    public function edit(City $city)
    {
        $states = State::all();
        return view('pages.cities.edit', compact(['states', 'city']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CityStoreRequest $request, City $city)
    {
        $city->update([
            'state_id' => $request->state_id,
            'name' => $request->name
        ]);
        return redirect()->route('cities.index')->with('message', 'City Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect()->route('cities.index')->with('message', 'City Deleted Successfully!');
    }
}
