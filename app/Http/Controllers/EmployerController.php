<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class EmployerController extends Controller
{
    public function dashboard()
    {
        return view('employer.dashboard', [
            'jobs' => auth()->user()->employer->jobs
        ]);
    }

    public function createJob()
    {
        return view('employer.jobs.create');
    }

    public function storeJob(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'type' => 'required|string',
            'location' => 'required|string',
            'salary_range' => 'required|string',
            'description' => 'required|string',
            'requirements' => 'required|string',
        ]);

        auth()->user()->employer->jobs()->create([
            'title' => $request->title,
            'type' => $request->type,
            'location' => $request->location,
            'salary_range' => $request->salary_range,
            'description' => $request->description,
            'requirements' => $request->requirements,
            'is_active' => true
        ]);

        return redirect()->route('dashboard')->with('status', 'Job posted successfully!');
    }
}
