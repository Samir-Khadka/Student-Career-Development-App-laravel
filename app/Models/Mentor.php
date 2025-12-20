<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mentor extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company',
        'position',
        'biography',
        'expertise_areas',
        'availability',
        'linkedin_url',
        'profile_image',
        'years_of_experience',
        'industry',
    ];

    protected $casts = [
        'expertise_areas' => 'array',
        'availability' => 'boolean',
        'years_of_experience' => 'integer',
    ];

    /**
     * Get the user that owns the mentor profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the mentorship requests for the mentor.
     */
    public function mentorshipRequests()
    {
        return $this->hasMany(MentorshipRequest::class, 'mentor_id');
    }

    /**
     * Scope a query to only include available mentors.
     */
    public function scopeAvailable($query)
    {
        return $query->where('availability', true);
    }

    /**
     * Scope a query to filter by industry.
     */
    public function scopeIndustry($query, $industry)
    {
        return $query->where('industry', 'like', '%' . $industry . '%');
    }

    /**
     * Scope a query to filter by expertise areas.
     */
    public function scopeExpertise($query, $expertise)
    {
        return $query->whereJsonContains('expertise_areas', $expertise);
    }
}