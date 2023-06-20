<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $countries = Country::all();
        if($request->has('search')){
            $countries = Country::where('name', 'like', "%{$request->search}%")->orWhere('code', 'like', "%{$request->search}%")->get();
        }

        return view('pages.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('pages.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CountryStoreRequest $request)
    {
        Country::create($request->validated());

        return redirect()->route('countries.index')->with('message', 'Country Created Successfully!');
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
    public function edit(Country $country)
    {
        return view('pages.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CountryStoreRequest $request, Country $country)
    {
        $country->update($request->validated());
        return redirect()->route('countries.index')->with('message', 'Country Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return redirect()->route('countries.index')->with('message', 'Country Deleted Successfully');
    }
}
