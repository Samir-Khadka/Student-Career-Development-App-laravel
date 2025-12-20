<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JobController extends Controller
{
    /**
     * Display job listings
     */
    public function index(Request $request)
    {
        $query = Job::query()->with('employer');

        // Apply filters
        // Apply filters
        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        if ($request->filled('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->filled('job_type')) {
            $jobTypes = is_array($request->job_type) ? $request->job_type : [$request->job_type];
            $query->whereIn('job_type', $jobTypes);
        }

        if ($request->filled('salary_min')) {
            // Extract numbers from salary (Format: "NRs. 30,000")
            // We strip non-numeric characters for comparison
            $minSalary = (int) preg_replace('/[^0-9]/', '', $request->salary_min);
            
            // This is a naive check since storing salary as string is bad practice.
            // Ideally should assume DB has integer. For now, we try to cast or use simple string comparison if format is consistent.
            // Better approach for string salary: just ensuring it's not null.
            // But if we must filter, we can try robust MySQL casting:
            $query->whereRaw("CAST(REGEXP_REPLACE(salary, '[^0-9]+', '') AS UNSIGNED) >= ?", [$minSalary]);
        }

        if ($request->filled('remote_only') && $request->remote_only) {
            $query->where(function($q) {
                $q->where('is_remote', true);
            });
        }

        $jobs = $query->active()->paginate(20);

        return view('jobs.index', compact('jobs'));
    }

    /**
     * Show job details
     */
    public function show($id)
    {
        $job = Job::with('employer')->findOrFail($id);
        return view('jobs.show', compact('job'));
    }

    /**
     * Search jobs via API
     */
    public function search(Request $request)
    {
        $query = $request->get('q');
        $location = $request->get('location');
        
        $jobs = [];
        
        // Search Adzuna API
        if (config('services.adzuna.api_key')) {
            try {
                $response = Http::get('https://api.adzuna.com/v1/api/jobs/gb/search/1', [
                    'app_id' => config('services.adzuna.app_id'),
                    'app_key' => config('services.adzuna.api_key'),
                    'results_per_page' => 10,
                    'what' => $query,
                    'where' => $location,
                ]);
                
                if ($response->successful()) {
                    $jobs = array_merge($jobs, $response->json()['results'] ?? []);
                }
            } catch (\Exception $e) {
                \Log::error('Adzuna API Error: ' . $e->getMessage());
            }
        }
        
        // Search Reed API
        if (config('services.reed.api_key')) {
            try {
                $response = Http::withHeaders([
                    'Authorization' => config('services.reed.api_key'),
                ])->get('https://www.reed.co.uk/api/1.0/search', [
                    'keywords' => $query,
                    'locationName' => $location,
                    'resultsToTake' => 10,
                ]);
                
                if ($response->successful()) {
                    $jobs = array_merge($jobs, $response->json()['results'] ?? []);
                }
            } catch (\Exception $e) {
                \Log::error('Reed API Error: ' . $e->getMessage());
            }
        }
        
        return response()->json(['jobs' => $jobs]);
    }

    /**
     * Save job for student
     */
    public function saveJob(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user || !$user->isStudent()) {
            return $this->error('Unauthorized');
        }

        $job = Job::findOrFail($id);
        $student = $user->student;
        
        // Toggle saved status
        if ($student->savedJobs()->where('job_id', $id)->exists()) {
            $student->savedJobs()->detach($id);
            return $this->success(null, 'Job removed from saved');
        } else {
            $student->savedJobs()->attach($id);
            return $this->success(null, 'Job saved successfully');
        }
    }

    /**
     * Apply for job
     */
    public function applyJob(Request $request, $id)
    {
        $user = auth()->user();
        if (!$user || !$user->isStudent()) {
            return $this->error('Unauthorized');
        }

        $job = Job::findOrFail($id);
        $student = $user->student;
        
        // Check if already applied
        if ($student->jobApplications()->where('job_id', $id)->exists()) {
            return $this->error('You have already applied for this job');
        }
        
        // Create application
        $application = $student->jobApplications()->create([
            'job_id' => $id,
            'status' => 'APPLIED',
            'notes' => $request->notes,
        ]);
        
        return $this->success($application, 'Application submitted successfully');
    }
}