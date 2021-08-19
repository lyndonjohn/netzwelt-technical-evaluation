<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class LoginController extends Controller
{
    public function index()
    {
        // If already logged in, redirect to home
        if (Auth::check()) {
            return redirect()->route('home');
        }

        return view('login');
    }

    public function authenticate(Request $request)
    {
        // Login form validation
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        // Send post request with username and password
        $response = Http::post('https://netzwelt-devtest.azurewebsites.net/Account/SignIn', [
            'username' => $request->username,
            'password' => $request->password,
        ]);

        // If status is 404, return to back to login page with message
        if ($response->status() === 404) {
            return back()->with('message', $response['message']);
        }

        // Associate logged user to local User model to utilise Auth facade
        $user = User::where('id', 1)->first();
        Auth::login($user);

        return redirect()->route('home');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
