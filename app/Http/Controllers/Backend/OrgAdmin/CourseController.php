<?php

namespace App\Http\Controllers\Backend\OrgAdmin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;


class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View|Application|Factory
     */
    public function index(): View|Application|Factory
    {
        $user = auth()->user(); // Get the authenticated user

        // Get the institutions the organization admin belongs to
        $institutionIds = $user->institutions->pluck('institution_id');

        // Get courses belonging to the same institutions
        $courses = DB::table('courses')
            ->join('course_institutions', 'course_institutions.course_id', '=', 'courses.course_id')
            ->whereIn('course_institutions.institution_id', $institutionIds)
            ->select('courses.course_id', 'courses.course_name', 'courses.course_image', 'courses.is_active') // Change to is_active
            ->get()
            ->map(function ($course) {
                $duration = DB::table('course_sessions')
                    ->where('course_id', $course->course_id)
                    ->selectRaw('SUM(DATEDIFF(end_date, start_date)) as duration')
                    ->first()
                    ->duration;

                $course->duration = $duration;
                return $course;
            });

        return view('backend.org_admin.courses.index', compact('courses'));
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        $orgAdmin = Auth::user();
        $institutionIds = $orgAdmin->institutions->pluck('institution_id')->toArray();

        $instructors = Instructor::whereIn('institution_id', $institutionIds)->get();

        return view('backend.org_admin.courses.create', compact('instructors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Get the logged-in org_admin's user_id
        $orgAdmin = auth()->user();

        // Validate the request
        $validatedData = $request->validate([
            'course_name' => 'required|string|max:255',
            'course_description' => 'required|string',
            'course_image' => 'nullable|image|mimes:jpeg,jpg,png|max:4096',
            'course_commitment' => 'required|string|max:255',
            'minimum_grade' => 'required|numeric|between:0,99.99',
            'instructor_id' => 'required|array',
            'instructor_id.*' => 'exists:instructors,instructor_id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Generate UUID for the course
        $uuid = (string)Str::uuid();

        // Create course directory and sub-folders
        $institutionDirectory = storage_path('app/public/institutions/' . $uuid);
        $courseDirectory = storage_path('app/public/institutions/' . $uuid . '/courses');
        File::makeDirectory($institutionDirectory, 0755, true);
        File::makeDirectory($courseDirectory, 0755, true);
        File::makeDirectory($courseDirectory . '/thumbnail', 0755, true);
        File::makeDirectory($courseDirectory . '/chapters', 0755, true);

        // Check if the user has uploaded an image for the course
        if ($request->hasFile('course_image')) {
            $courseThumbnail = $request->file('course_image');
            $courseThumbnailExtension = $courseThumbnail->getClientOriginalExtension();
            $uniqueThumbnailName = $uuid . '_' . time() . '.' . $courseThumbnailExtension;
            $courseThumbnailPath = $courseThumbnail->storeAs('institutions/' . $uuid . '/courses/thumbnail', $uniqueThumbnailName, 'public');
        } else {
            // Set the default path for the thumbnail image
            $courseThumbnailPath = 'img/default/default-course.jpg';
        }

        // Save to the database
        $course = Course::create([
            'course_name' => $validatedData['course_name'],
            'course_description' => $validatedData['course_description'],
            'course_image' => $courseThumbnailPath,
            'course_commitment' => $validatedData['course_commitment'],
            'minimum_grade' => $validatedData['minimum_grade'],
        ]);

        $course->instructors()->attach($validatedData['instructor_id']);

        $courseCreator = $orgAdmin->institutions()->first();
        $courseCreator->courses()->attach($course->course_id);

        $course->courseSessions()->create([
            'start_date' => $validatedData['start_date'],
            'end_date' => $validatedData['end_date'],
        ]);

        return redirect()->route('org_admin.courses.index')->with([
            'message' => 'Course created successfully',
            'alert-type' => 'success'
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
