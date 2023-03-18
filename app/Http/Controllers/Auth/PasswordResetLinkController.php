<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Support\Facades\Password;
use Laravel\Fortify\Http\Controllers\PasswordResetLinkController as FortifyPasswordResetLinkController;
use Illuminate\Http\Request;
use Laravel\Fortify\Http\Responses\SuccessfulPasswordResetLinkRequestResponse;

class PasswordResetLinkController extends FortifyPasswordResetLinkController
{
    /**
     * Send a reset link to the given user.
     *
     * @param Request $request
     * @return Responsable
     */
    public function store(Request $request) : Responsable
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        if ($status === Password::RESET_LINK_SENT) {
            return app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => $status]);
        } else {
            return app(SuccessfulPasswordResetLinkRequestResponse::class, ['status' => "We have emailed your password reset link."]);
        }
    }
}
