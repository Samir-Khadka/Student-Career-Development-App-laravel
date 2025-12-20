<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Mentor;
use App\Models\Student;
use App\Models\Skill;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create specific test users
        $student = User::firstOrCreate(
            ['email' => 'ashu123@gmail.com'],
            [
                'name' => 'Ashutosh Bhatta',
                'password' => bcrypt('password'),
                'role' => 'STUDENT',
            ]
        );
        if (!$student->student) {
            $student->student()->create([
                'university' => 'Tribhuvan University',
                'course' => 'BSc. CSIT',
                'graduation_year' => 2025,
                'bio' => 'Aspiring Software Engineer passionate about Laravel and React.',
            ]);
        }

        $employer = User::firstOrCreate(
            ['email' => 'hr@techcorp.com'],
            [
                'name' => 'Tech Corp HR',
                'password' => bcrypt('password'),
                'role' => 'EMPLOYER',
            ]
        );
        $empProfile = $employer->employer;
        if (!$empProfile) {
            $empProfile = $employer->employer()->create([
                'company_name' => 'Tech Corp',
                'description' => 'Leading innovation in software solutions.',
                'industry' => 'Technology',
                'company_size' => '100-500',
                'website' => 'https://techcorp.com',
                'location' => 'Kathmandu, Nepal'
            ]);
        }

        $mentor = User::firstOrCreate(
            ['email' => 'john@mentor.com'],
            [
                'name' => 'Senior Dev John',
                'password' => bcrypt('password'),
                'role' => 'MENTOR',
            ]
        );
        if (!$mentor->mentor) {
            $mentor->mentor()->create([
                'position' => 'Senior Software Engineer',
                'company' => 'Global Tech',
                'years_of_experience' => 10,
                'industry' => 'Software Development',
                'expertise_areas' => '["PHP", "Laravel", "System Design"]',
                'biography' => 'Helping students bridge the gap between academia and industry.',
                'availability' => 'Weekends'
            ]);
        }

        // 2. Create Dummy Jobs
        if ($empProfile) {
            Job::firstOrCreate(
                ['title' => 'Junior Laravel Developer', 'employer_id' => $empProfile->id],
                [
                    'description' => 'We are looking for a junior developer to join our backend team. You will work on building scalable APIs and microservices.',
                    'requirements' => 'Strong PHP knowledge, familiarity with Laravel, Basic Git usage.',
                    'salary' => 'NRs. 30,000 - 50,000',
                    'location' => 'Kathmandu (On-site)',
                    'job_type' => 'FULL_TIME',
                    'is_active' => true,
                ]
            );

            Job::firstOrCreate(
                ['title' => 'React Frontend Intern', 'employer_id' => $empProfile->id],
                [
                    'description' => 'Join us as an intern and learn modern frontend development using React and TypeScript.',
                    'requirements' => 'Basic HTML/CSS/JS knowledge. Willingness to learn.',
                    'salary' => 'NRs. 15,000',
                    'location' => 'Remote',
                    'job_type' => 'INTERNSHIP',
                    'is_active' => true,
                ]
            );
        }
        
        // 3. Create more dummy data (50+ records)
        \App\Models\User::factory(40)->create()->each(function ($user) {
             if ($user->role === 'STUDENT') {
                 $user->student()->save(\App\Models\Student::factory()->make());
             } elseif ($user->role === 'EMPLOYER') {
                 $e = $user->employer()->save(\App\Models\Employer::factory()->make());
                 // Create jobs for this employer
                 \App\Models\Job::factory(rand(1, 5))->create(['employer_id' => $e->id]);
             } elseif ($user->role === 'MENTOR') {
                 $user->mentor()->save(\App\Models\Mentor::factory()->make());
             }
        });
        
        // Run Skills Seeder if it works
        // $this->call(SkillsTableSeeder::class);
    }
}