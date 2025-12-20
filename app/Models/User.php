<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Get the student profile associated with the user.
     */
    public function student()
    {
        return $this->hasOne(Student::class);
    }

    /**
     * Get the mentor profile associated with the user.
     */
    public function mentor()
    {
        return $this->hasOne(Mentor::class);
    }

    /**
     * Get the employer profile associated with the user.
     */
    public function employer()
    {
        return $this->hasOne(Employer::class);
    }

    /**
     * Check if the user is a student.
     */
    public function isStudent()
    {
        return $this->role === 'STUDENT';
    }

    /**
     * Check if the user is a mentor.
     */
    public function isMentor()
    {
        return $this->role === 'MENTOR';
    }

    /**
     * Check if the user is an employer.
     */
    public function isEmployer()
    {
        return $this->role === 'EMPLOYER';
    }

    /**
     * Check if the user is an admin.
     */
    public function isAdmin()
    {
        return $this->role === 'ADMIN';
    }
}
