<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\candidate;
use App\Models\employer;

class AuthController extends Controller
{
    // Login Logic
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to login as Candidate
        if (Auth::guard('candidate')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('candidateProfile');
        }

        // Attempt to login as Employer
        // Note: Employer model uses 'email_adress' column, not 'email'
        if (Auth::guard('employer')->attempt(['email_adress' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            return redirect()->route('dashboard.recruiter');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    // Register Logic
    public function register(Request $request)
    {
        // Candidate Registration
        if ($request->has('sign_up_candidate')) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:candidates',
                'password' => 'required|string|min:8|same:confirm_pass',
            ]);

            $candidate = candidate::create([
                'first_name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Use Bcrypt
            ]);

            Auth::guard('candidate')->login($candidate);
            return redirect()->route('candidateProfile');
        }

        // Employer Registration
        if ($request->has('sign_up_recruter')) {
            $request->validate([
                'nameR' => 'required|string|max:255',
                'emailR' => 'required|string|email|max:255|unique:employers,email_adress',
                'passwordR' => 'required|string|min:8|same:confirm_passR',
            ]);

            $employer = employer::create([
                'name' => $request->nameR,
                'email_adress' => $request->emailR,
                'password' => Hash::make($request->passwordR), // Use Bcrypt
            ]);

            Auth::guard('employer')->login($employer);
            return redirect()->route('dashboard.recruiter');
        }

        return back()->withInput();
    }

    // Logout Logic
    public function logout(Request $request)
    {
        if (Auth::guard('candidate')->check()) {
            Auth::guard('candidate')->logout();
        } elseif (Auth::guard('employer')->check()) {
            Auth::guard('employer')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
