<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Institution;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil;

class InstitutionsController extends Controller
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
        $institutions = DB::table('institutions')
            ->select('institutions.institution_id', 'institutions.institution_name', 'institutions.institution_website', 'institutions.institution_email', 'institutions.is_disabled', 'institutions.institution_address')
            ->get();

        return view('backend.admin.institutions.index', compact('institutions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): Factory|View|Application
    {
        return view('backend.admin.institutions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        // Validate data
        $validatedData = $request->validate([
            'institution_name' => 'required|string|max:255',
            'institution_abbreviation' => 'required|string|max:255',
            'institution_website' => 'required|string|max:255',
            'institution_email' => 'required|string|email|max:255',
            'dial_code' => 'required|string',
            'institution_phone' => 'required|string',
            'institution_address' => 'required|string|max:255',
        ]);

        // Create new institution
        $institution = Institution::create([
            'institution_name' => $validatedData['institution_name'],
            'institution_abbreviation' => $validatedData['institution_abbreviation'],
            'institution_website' => $validatedData['institution_website'],
            'dial_code' => $request->dial_code, // get value from JavaScript
            'institution_phone' => $request->institution_phone, // get value from JavaScript
            'institution_email' => $validatedData['institution_email'],
            'institution_address' => $validatedData['institution_address'],
        ]);

        $institution->save();

        // Return success message
        return response()->json(['message' => 'Process completed successfully.'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     * @throws NumberParseException
     */
    public function show(string $id): Factory|View|Application
    {
        $institution = DB::table('institutions')
            ->where('institution_id', $id)
            ->select('institution_name', 'institution_abbreviation', 'institution_website', 'institution_email', 'dial_code', 'institution_phone', 'institution_address', 'is_disabled')
            ->first();

        $phoneUtil = PhoneNumberUtil::getInstance();
        $phoneNumber = $phoneUtil->parse('+' . $institution->dial_code.$institution->institution_phone);
        $formattedPhoneNumber = $phoneUtil->format($phoneNumber, PhoneNumberFormat::INTERNATIONAL);

        $institution->institution_phone = $formattedPhoneNumber;

        return view('backend.admin.institutions.details', compact('institution'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param string $id
     * @return Application|Factory|View
     */
    public function edit(string $id): Application|Factory|View
    {
        // Retrieve the institution record from the database using the $id parameter
        $institution = Institution::findOrFail($id);

        // Pass the $institution variable to the view
        return view('backend.admin.institutions.edit', compact('institution'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        $institution = Institution::findOrFail($id);

        $institution->update($request->all());

        return redirect()->route('institutions.index')->with([
            'notice' => 'Institution info updated successfully.',
            'noticeBg' => 'alert-success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
