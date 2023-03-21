<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index(UserController $userController) : Renderable
    {
        $users = $userController->index()->getData()['users'];
        return view('backend.admin.index', compact('users'));
    }
}
