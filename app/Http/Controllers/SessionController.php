<?php

namespace App\Http\Controllers;

use App\Http\Requests\SessionStoreRequest;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $sessions = Session::all();
        if($request->has('search')){
            $sessions = Session::where('name', 'like', "%{$request->search}%")->get();
        }

        return view('pages.sessions.index', compact('sessions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // $learningCenter = LearningCenter::all();
        return view('pages.sessions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SessionStoreRequest $request)
    {
        Session::create($request->validated());
        return redirect()->route('sessions.index')->with('message', 'Session Created Successfully!');
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
    public function edit(Session $session): View
    {
        return view('pages.sessions.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SessionStoreRequest $request, Session $session)
    {
        $session->update([
            'name' => $request->name
        ]);
        return redirect()->route('sessions.index')->with('message', 'Session Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Session $session)
    {
        $session->delete();
        return redirect()->route('sessions.index')->with('message', 'Session Deleted Successfully!');
    }
}
