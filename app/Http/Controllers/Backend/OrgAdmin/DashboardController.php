<?php

namespace App\Http\Controllers\Backend\OrgAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Support\Renderable;

class DashboardController extends Controller
{
    public function index(): Renderable
    {
        return view('backend.org_admin.index');
    }
}
