<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewUserMail;
use App\Models\Institution;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return View|Factory|Application
     */
    public function index(): Factory|View|Application
    {
        $users = DB::table('users')
            ->join('user_roles', 'users.user_id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.role_id', '=', 'user_roles.role_id')
            ->select('users.user_id', 'users.name', 'users.email', 'users.is_disabled', 'users.last_login', 'roles.display_name', 'users.is_admin')
            ->get();

        return view('backend.admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('backend.admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate user input
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ]);

        // Create and Save New User
        $temp_password = Str::random(8);

        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            'password' => Hash::make($temp_password),
        ]);
        $user->roles()->attach(4);

        $user->save();
        // End of Create and Save New User

        // Route to login page after clicking on link
        $loginUrl = route('login');

        // Route to reset password page after clicking on link
        $resetPasswordUrl = route('password.request');

        // Mail to user
        Mail::to($user->email)->send(new NewUserMail($user, $temp_password, $loginUrl, $resetPasswordUrl));

        return redirect()->route('users.index')->with([
            'notice' => 'User created and email sent successfully.',
            'noticeBg' => 'alert-success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function show(int $id): View|Factory|Application
    {
        $user = DB::table('users')
            ->join('user_roles', 'users.user_id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.role_id', '=', 'user_roles.role_id')
            ->where('users.user_id', $id)
            ->select('users.user_id', 'users.name', 'users.email', 'users.is_disabled', 'users.is_admin', 'users.last_login', 'roles.display_name', 'users.created_at')
            ->first();

        return view('backend.admin.users.details', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Application|Factory|View
     */
    public function edit(int $id): View|Factory|Application
    {
        $roles = Role::all();
        $institutions = Institution::all();

        $user = DB::table('users')
            ->join('user_roles', 'users.user_id', '=', 'user_roles.user_id')
            ->join('roles', 'roles.role_id', '=', 'user_roles.role_id')
            ->select('users.user_id', 'users.name', 'users.email')
            ->where('users.user_id', $id)
            ->first();

        $userRole = DB::table('user_roles')->where('user_id', $id)->value('role_id');
        $userInstitution = DB::table('user_institutions')->where('user_id', $id)->value('institution_id');

        return view('backend.admin.users.edit', compact('user', 'roles', 'userRole', 'institutions', 'userInstitution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(Request $request, int $id): RedirectResponse
    {
        $user = User::findOrFail($id);
        $user->update($request->only(['name', 'email']));

        $role = Role::findOrFail($request->input('role'));
        $user->roles()->sync($role->role_id);

        if ($role->role_id === 2){
            $institution = Institution::findOrFail($request->input('institution_name'));
            $user->institutions()->sync([$institution->institution_id]);
            $user->update(['is_org_admin' => true]);
        }

        return redirect()->route('users.index')->with([
            'notice' => 'User info updated successfully.',
            'noticeBg' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id): RedirectResponse
    {
        User::where('user_id', $id)->delete();
        return redirect()->route('users.index')->with('notice', 'User deleted successfully')->with('noticeBg', 'alert-success');
    }

    /**
     * Disable the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function disable(int $id): RedirectResponse
    {
        $user = User::where('user_id', $id)->firstOrFail();
        $user->is_disabled = true;
        $user->save();

        return redirect()->route('users.index')->with('notice', 'Account disabled successfully')->with('noticeBg', 'alert-success');
    }

    /**
     * Enable the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function enable(int $id): RedirectResponse
    {
        $user = User::where('user_id', $id)->firstOrFail();
        $user->is_disabled = false;
        $user->save();

        return redirect()->route('users.index')->with('notice', 'Account enabled successfully')->with('noticeBg', 'alert-success');
    }
}
