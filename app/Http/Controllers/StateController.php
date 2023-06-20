<?php

namespace App\Http\Controllers;

use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $states = State::all();
        if($request->has('search')){
            $states = State::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('pages.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $countries = Country::all();
        return view('pages.states.create', compact(['countries']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StateStoreRequest $request)
    {
        
        State::create($request->validated());
        return redirect()->route('states.index')->with('message', 'State Created Successfully!');
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
    public function edit(State $state)
    {
        $countries = Country::all();
        return view('pages.states.edit', compact(['state', 'countries']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StateStoreRequest $request, State $state)
    {
        $state->update([
            'country_id' => $request->country_id,
            'name' => $request->name
        ]);
        return redirect()->route('states.index')->with('message', 'State Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(State $state)
    {
        $state->delete();
        return redirect()->route('states.index')->with('message', 'State Deleted Successfully!');
    }
}
