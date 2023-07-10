<?php

namespace App\Http\Controllers;

use App\Http\Requests\StaffStoreRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Ngo;
use App\Models\Staff;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $staff = Staff::all();
        if($request->has('search')){
            $staff = Staff::where('name', 'like', "%{$request->search}%")->orWhere('phone', 'like', "%{$request->search}%")->orWhere('country', 'like', "%{$request->search}%")->get();
        }
        return view('pages.staff.index', compact('staff'));
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
        $users = User::all();
        return view('pages.staff.create', compact(['countries', 'states', 'cities', 'ngos', 'users']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StaffStoreRequest $request)
    {
        Staff::create($request->validated());
        return redirect()->route('staff.index')->with('message', 'Staff Created Successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff): View
    {
        return view('pages.staff.edit', compact('staff'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StaffStoreRequest $request, Staff $staff)
    {
        $staff->update($request->validated());
        return redirect()->route('staff.index')->with('message', 'Staff Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('message', 'Staff Deleted Successfully!');
    }
}
