<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class PasswordResetLinkController extends Controller
{
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            "email" => ["required", "email"],
        ]);
        $status = Password::sendResetLink($request->only("email"));

        if ($status === Password::RESET_THROTTLED) {
            back()->withErrors(["email" => [$status]]);
        }

        return back()->with("status", "passwords.sent");
    }
}
