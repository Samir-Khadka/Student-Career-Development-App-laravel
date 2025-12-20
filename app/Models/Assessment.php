<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'skill_category',
        'score',
        'max_score',
        'percentage',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
        'percentage' => 'float',
    ];

    /**
     * Get the student that owns the assessment.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Scope a query to filter by skill category.
     */
    public function scopeCategory($query, $category)
    {
        return $query->where('skill_category', $category);
    }

    /**
     * Scope a query to filter by date range.
     */
    public function scopeDateRange($query, $startDate, $endDate)
    {
        return $query->whereBetween('completed_at', [$startDate, $endDate]);
    }
}