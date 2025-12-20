<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_id',
        'title',
        'description',
        'requirements',
        'location',
        'job_type',
        'salary',
        'is_remote',
        'is_hybrid',
        'external_api_id',
        'external_url',
        'is_active',
        'application_deadline',
    ];

    protected $casts = [
        'is_remote' => 'boolean',
        'is_hybrid' => 'boolean',
        'is_active' => 'boolean',
        'application_deadline' => 'date',
    ];

    /**
     * Get the employer that owns the job.
     */
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    /**
     * Get the saved jobs for this job.
     */
    public function savedJobs()
    {
        return $this->belongsToMany(Student::class, 'saved_jobs')->withTimestamps();
    }

    /**
     * Get the job applications for this job.
     */
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }

    /**
     * Scope a query to only include active jobs.
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope a query to only include remote jobs.
     */
    public function scopeRemote($query)
    {
        return $query->where('is_remote', true);
    }

    /**
     * Scope a query to only include hybrid jobs.
     */
    public function scopeHybrid($query)
    {
        return $query->where('is_hybrid', true);
    }

    /**
     * Scope a query to filter by location.
     */
    public function scopeLocation($query, $location)
    {
        return $query->where('location', 'like', '%' . $location . '%');
    }

    /**
     * Scope a query to filter by job type.
     */
    public function scopeJobType($query, $jobType)
    {
        return $query->where('job_type', $jobType);
    }
}