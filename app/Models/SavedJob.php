<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SavedJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'job_id',
    ];

    /**
     * Get the student that saved the job.
     */
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    /**
     * Get the job that was saved.
     */
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}