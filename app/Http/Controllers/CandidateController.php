<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\candidate;
use App\Models\application;

class CandidateController extends Controller
{
    public function profile()
    {
        $candidate = Auth::guard('candidate')->user();
        return view('candidate.profile', compact('candidate'));
    }

    public function updateProfile(Request $request)
    {
        $candidate = Auth::guard('candidate')->user();
        $candidate->update($request->all());
        return back()->with('success', 'Profile Updated');
    }
}