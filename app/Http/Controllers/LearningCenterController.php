<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LearningCenterController extends Controller
{
    public function index(){
        return view('pages.learning-center.index');
    }
}
