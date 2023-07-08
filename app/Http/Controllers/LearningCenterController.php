<?php

namespace App\Http\Controllers;

use App\Http\Requests\LearningCenterStoreRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\LearningCenter;
use App\Models\Ngo;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LearningCenterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $learningCenters = LearningCenter::all();
        if($request->has('search')){
            $learningCenters = LearningCenter::where('name', 'like', "%{$request->search}%")->orWhere('ngo_id', 'like', "%{$request->search}%")->get();
        }

        return view('pages.learning-center.index', compact('learningCenters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {

        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $ngos = Ngo::all();
        return view('pages.learning-center.create', compact(['countries', 'states', 'cities', 'ngos']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(LearningCenterStoreRequest $request)
    {
        LearningCenter::create($request->validated());

        return redirect()->route('learning-centers.index')->with('message', 'Learning Center Created Successfully!');
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
    public function edit(LearningCenter $learningCenter)
    {
        $countries = Country::all();
        $states = State::all();
        $cities = City::all();
        $ngos = Ngo::all();
        return view('pages.learning-center.edit', compact('learningCenter', 'ngos', 'countries', 'states', 'cities'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(LearningCenterStoreRequest $request, LearningCenter $learningCenter)
    {
        $learningCenter->update($request->validated());
        return redirect()->route('learning-centers.index')->with('message', 'Learning Center Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $learningCenter = LearningCenter::findOrFail($id);
        $learningCenter->delete();
        return redirect()->route('learning-centers.index')->with('message', 'Learning Center Deleted Successfully');
    }
}
