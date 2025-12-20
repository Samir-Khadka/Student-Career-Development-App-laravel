<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobApplication extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'job_id',
        'status',
        'applied_at',
        'notes',
    ];

    protected $casts = [
        'applied_at' => 'datetime',
    ];

    /**
     * Get the student that made the application.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the job that was applied for.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    /**
     * Scope a query to filter by status.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to get recent applications.
     */
    public function scopeRecent($query, $days = 30)
    {
        return $query->where('applied_at', '>=', now()->subDays($days));
    }
}