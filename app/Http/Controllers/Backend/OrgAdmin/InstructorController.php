<?php

namespace App\Http\Controllers\Backend\OrgAdmin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstructorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View|Application|Factory
    {
        $instructors = DB::table('instructors')
            ->join('users', 'users.user_id', '=', 'instructors.user_id')
            ->select('instructors.instructor_name', 'instructors.instructor_title', 'instructors.instructor_department', 'users.is_disabled', 'users.email')
            ->get();

        return view('backend.org_admin.instructors.index', compact('instructors'));
    }

    /**
     * Find a user to invite as an instructor.
     * @param Request $request
     * @return RedirectResponse
     */
    public function findUser(Request $request): RedirectResponse
    {
        $orgAdmin = auth()->user();

        // Get the institution of the logged in org_admin
        $institution = $orgAdmin->institutions()->first();

        // Find the user's email whose role is "Student"
        $user = User::where('email', $request->email)
            ->whereHas('roles', function ($query) {
                $query->whereIn('user_roles.role_id', [3, 4]);
            })
            ->first();

        if (!$user) {
            return redirect()->back()->with([
                'notice' => 'User with this email is not found.',
                'noticeBg' => 'alert-danger'
            ]);
        } else {
            // Generate hashed id for the invitation
            $hashedId = hash('sha256', $user->user_id);
        }

        // Check if the user has already been invited to join as an instructor
        if (Instructor::where('user_id', $user->user_id)->exists()) {
            return redirect()->back()->with([
                'notice' => 'This user has already been invited to join as an instructor.',
                'noticeBg' => 'alert-danger'
            ]);
        }

        session()->put('user', $user);

        return redirect()->route('instructors.inviteUser', [
            'hashedId' => $hashedId,
            'name' => $user->name,
            'email' => $user->email,
            'institution_name' => $institution->institution_name,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $org_admin = auth()->user();

        // Get the institution of the logged in org_admin
        $institution = $org_admin->institutions()->first();

        // Get the user from the session
        $user = session()->get('user');

        // Validate input request
        $validatedData = $request->validate([
            'instructor_title' => 'required|max:50',
            'instructor_department' => 'required|max:50',
        ]);

        $instructorName = $request->input('instructor_name') ?? $user->name;

        $instructor = new Instructor([
            'user_id' => $user->user_id,
            'institution_id' => $institution->institution_id,
            'instructor_name' => $instructorName,
            'instructor_title' => $validatedData['instructor_title'],
            'instructor_department' => $validatedData['instructor_department'],
        ]);

        $instructor->save();

        // Update the user's role to instructor
        $instructorRole = Role::where('role_id', 3)->firstOrFail();
        $user->roles()->sync([$instructorRole->role_id]);

        return redirect()->route('instructors.index')->with([
            'notice' => 'Instructor has been added successfully.',
            'noticeBg' => 'alert-success'
        ]);
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
