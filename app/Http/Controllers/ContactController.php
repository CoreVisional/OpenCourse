<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;

class ContactController extends Controller
{
    /**
     * Display the specified resource.
     * @return Application|Factory|View
     */
    public function show(): View|Factory|Application
    {
        return view('pages.contact-us');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);

        Mail::send('emails.contact', ['emailContent' => $request->get('message')], function ($message) use ($request) {
            $message->from($request->email, $request->name);
            $message->to('support@opencourse.net')->subject($request->subject);
        });

        return back()->with([
            'notice' => 'Thank you for contacting us. We will get back to you shortly.',
            'noticeBg' => 'alert-success'
        ]);
    }
}
