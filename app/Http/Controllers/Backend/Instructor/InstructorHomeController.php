<?php

namespace App\Http\Controllers\Backend\Instructor;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;
class InstructorHomeController extends Controller
{
    public function index(): Renderable
    {
        return view('backend.instructor.index');
    }
}
