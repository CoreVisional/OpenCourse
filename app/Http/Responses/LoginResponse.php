<?php

namespace App\Http\Responses;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;
use Symfony\Component\HttpFoundation\Response;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  Request  $request
     * @return Response
     */
    public function toResponse($request): Response
    {
        // get the authenticated user
        $user = Auth::user();

        // get the user's associated role
        $role = $user->roles()->first();

        if ($request->wantsJson()) {
            return response()->json(['two_factor' => false]);
        }

        return match ($role->role_name) {
            'admin' => redirect('/admin'),
            'org_admin' => redirect('/org_admin'),
            'instructor' => redirect('/instructor'),
            default => redirect('/'),
        };
    }
}
