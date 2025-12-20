<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorshipRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'mentor_id',
        'status',
        'request_message',
        'response_message',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the student that made the request.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the mentor that received the request.
     */
    public function mentor()
    {
        return $this->belongsTo(Mentor::class);
    }

    /**
     * Scope a query to filter by status.
     */
    public function scopeStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    /**
     * Scope a query to get pending requests.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'PENDING');
    }

    /**
     * Scope a query to get accepted requests.
     */
    public function scopeAccepted($query)
    {
        return $query->where('status', 'ACCEPTED');
    }

    /**
     * Scope a query to get declined requests.
     */
    public function scopeDeclined($query)
    {
        return $query->where('status', 'DECLINED');
    }
}