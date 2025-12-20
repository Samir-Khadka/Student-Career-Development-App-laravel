<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Handle login request.
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            // Redirect based on user role
            $user = Auth::user();
            switch ($user->role) {
                case 'STUDENT':
                    return redirect()->route('student.dashboard');
                case 'MENTOR':
                    return redirect()->route('mentor.dashboard');
                case 'EMPLOYER':
                    return redirect()->route('employer.dashboard');
                case 'ADMIN':
                    return redirect()->route('admin.dashboard');
                default:
                    return redirect()->route('dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Show the registration form.
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Handle registration request.
     */
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:STUDENT,MENTOR,EMPLOYER',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
            'role' => $validated['role'],
        ]);

        // Create role-specific profile
        switch ($validated['role']) {
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
     * Log the user out.
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}