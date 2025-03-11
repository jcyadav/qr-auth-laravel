<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'qr_code' => 'required|string',
        ]);

        $userId = $request->qr_code;

        // Find the user
        $user = User::find($userId);

        if ($user) {
            Auth::login($user);
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors(['qr_code' => 'Invalid QR code.']);
    }
}
