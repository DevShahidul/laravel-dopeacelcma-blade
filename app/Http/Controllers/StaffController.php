<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use function Ramsey\Uuid\v1;

class StaffController extends Controller
{
    public function index()
    {
        return view('pages.staff.index');
    }
    public function create(){
        return view('pages.staff.form');
    }
}
