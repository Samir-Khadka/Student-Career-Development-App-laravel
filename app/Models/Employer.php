<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'company_name',
        'description',
        'industry',
        'website',
        'logo_url',
        'company_size',
        'location',
    ];

    /**
     * Get the user that owns the employer profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the jobs posted by the employer.
     */
    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    /**
     * Scope a query to filter by industry.
     */
    public function scopeIndustry($query, $industry)
    {
        return $query->where('industry', 'like', '%' . $industry . '%');
    }

    /**
     * Scope a query to filter by location.
     */
    public function scopeLocation($query, $location)
    {
        return $query->where('location', 'like', '%' . $location . '%');
    }

    /**
     * Scope a query to filter by company size.
     */
    public function scopeCompanySize($query, $size)
    {
        return $query->where('company_size', $size);
    }
}