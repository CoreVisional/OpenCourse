<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;

class CourseController extends Controller
{
    public function index(): Renderable
    {
        return view('pages.course');
    }
}
