<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bio',
        'university',
        'course',
        'graduation_year',
        'location',
        'career_goals',
        'profile_image',
        'resume_url',
        'linkedin_url',
        'github_url',
    ];

    protected $casts = [
        'graduation_year' => 'integer',
    ];

    /**
     * Get the user that owns the student profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the skills associated with the student.
     */
    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'student_skills')
            ->withPivot('proficiency_level')
            ->withTimestamps();
    }

    /**
     * Get the assessments for the student.
     */
    public function assessments()
    {
        return $this->hasMany(Assessment::class);
    }

    /**
     * Get the mentorship requests for the student.
     */
    public function mentorshipRequests()
    {
        return $this->hasMany(MentorshipRequest::class, 'student_id');
    }

    /**
     * Get the saved jobs for the student.
     */
    public function savedJobs()
    {
        return $this->belongsToMany(Job::class, 'saved_jobs')->withTimestamps();
    }

    /**
     * Get the job applications for the student.
     */
    public function jobApplications()
    {
        return $this->hasMany(JobApplication::class);
    }
}