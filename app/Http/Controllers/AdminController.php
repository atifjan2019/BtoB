<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {
        if (session('admin_authed')) {
            return redirect()->route('admin.dashboard');
        }

        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'passcode' => ['required', 'string'],
        ]);

        if ($request->input('passcode') !== '123') {
            return back()
                ->withErrors(['passcode' => 'Incorrect passcode.'])
                ->onlyInput('passcode');
        }

        $request->session()->regenerate();
        $request->session()->put('admin_authed', true);

        return redirect()->route('admin.dashboard');
    }

    public function dashboard()
    {
        if (! session('admin_authed')) {
            return redirect()->route('admin.login');
        }

        return view('admin.dashboard');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('admin_authed');
        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
