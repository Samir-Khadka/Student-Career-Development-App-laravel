<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show login form
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect to dashboard
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show registration form
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:STUDENT,MENTOR,EMPLOYER',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role,
        ]);

        // Create role-specific profile
        switch ($request->role) {
            case 'STUDENT':
                $user->student()->create([
                    'bio' => '',
                    'university' => '',
                    'course' => '',
                    'graduation_year' => date('Y') + 1,
                    'location' => '',
                    'career_goals' => '',
                ]);
                break;
            case 'MENTOR':
                $user->mentor()->create([
                    'company' => '',
                    'position' => '',
                    'biography' => '',
                    'expertise_areas' => json_encode([]),
                    'availability' => true,
                    'years_of_experience' => 0,
                    'industry' => '',
                ]);
                break;
            case 'EMPLOYER':
                $user->employer()->create([
                    'company_name' => '',
                    'description' => '',
                    'industry' => '',
                    'website' => '',
                    'company_size' => '',
                    'location' => '',
                ]);
                break;
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

    /**
     * Log user out
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}