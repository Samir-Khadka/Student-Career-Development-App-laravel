# CareerOne - Laravel Implementation Guide

## 🎯 Project Overview
Student Career Development Platform built with Laravel, MySQL, and Bootstrap 5

## 🛠 Technology Stack
- **Backend**: Laravel 10.x (PHP 8.2+)
- **Database**: MySQL 8.0+
- **Frontend**: Bootstrap 5 + Plain JavaScript
- **API Integration**: Adzuna, Reed, Indeed APIs
- **Authentication**: Laravel Sanctum
- **File Storage**: Laravel Storage (local/cloud)

## 📁 Project Structure

```
careerone/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Auth/
│   │   │   │   ├── AuthenticatedSessionController.php
│   │   │   │   ├── ConfirmablePasswordController.php
│   │   │   │   ├── EmailVerificationNotificationController.php
│   │   │   │   ├── EmailVerificationPromptController.php
│   │   │   │   ├── NewPasswordController.php
│   │   │   │   ├── PasswordController.php
│   │   │   │   ├── PasswordResetLinkController.php
│   │   │   │   ├── RegisteredUserController.php
│   │   │   │   └── VerifyEmailController.php
│   │   │   ├── Student/
│   │   │   │   ├── StudentController.php
│   │   │   │   ├── StudentProfileController.php
│   │   │   │   └── StudentSkillController.php
│   │   │   ├── Mentor/
│   │   │   │   ├── MentorController.php
│   │   │   │   └── MentorshipController.php
│   │   │   ├── Employer/
│   │   │   │   ├── EmployerController.php
│   │   │   │   └── JobController.php
│   │   │   ├── Admin/
│   │   │   │   ├── AdminController.php
│   │   │   │   └── UserController.php
│   │   │   ├── Api/
│   │   │   │   ├── JobApiController.php
│   │   │   │   └── AssessmentController.php
│   │   │   └── Controller.php
│   │   ├── Middleware/
│   │   │   ├── Authenticate.php
│   │   │   ├── RoleMiddleware.php
│   │   │   └── RedirectIfAuthenticated.php
│   │   └── Requests/
│   │       ├── Auth/
│   │       ├── Student/
│   │       ├── Mentor/
│   │       └── Employer/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Student.php
│   │   ├── Mentor.php
│   │   ├── Employer.php
│   │   ├── Job.php
│   │   ├── Skill.php
│   │   ├── StudentSkill.php
│   │   ├── Assessment.php
│   │   ├── MentorshipRequest.php
│   │   ├── SavedJob.php
│   │   └── JobApplication.php
│   ├── Services/
│   │   ├── JobApiService.php
│   │   ├── AssessmentService.php
│   │   └── EmailService.php
│   └── Providers/
│       └── AppServiceProvider.php
├── database/
│   ├── migrations/
│   │   ├── 2024_01_01_000000_create_users_table.php
│   │   ├── 2024_01_01_000001_create_students_table.php
│   │   ├── 2024_01_01_000002_create_mentors_table.php
│   │   ├── 2024_01_01_000003_create_employers_table.php
│   │   ├── 2024_01_01_000004_create_jobs_table.php
│   │   ├── 2024_01_01_000005_create_skills_table.php
│   │   ├── 2024_01_01_000006_create_student_skills_table.php
│   │   ├── 2024_01_01_000007_create_assessments_table.php
│   │   ├── 2024_01_01_000008_create_mentorship_requests_table.php
│   │   ├── 2024_01_01_000009_create_saved_jobs_table.php
│   │   └── 2024_01_01_000010_create_job_applications_table.php
│   └── seeders/
│       ├── UserSeeder.php
│       ├── SkillSeeder.php
│       └── JobSeeder.php
├── resources/
│   ├── views/
│   │   ├── layouts/
│   │   │   ├── app.blade.php
│   │   │   ├── auth.blade.php
│   │   │   ├── student.blade.php
│   │   │   ├── mentor.blade.php
│   │   │   ├── employer.blade.php
│   │   │   └── admin.blade.php
│   │   ├── auth/
│   │   │   ├── login.blade.php
│   │   │   ├── register.blade.php
│   │   │   ├── forgot-password.blade.php
│   │   │   └── reset-password.blade.php
│   │   ├── student/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── profile.blade.php
│   │   │   ├── skills.blade.php
│   │   │   └── jobs.blade.php
│   │   ├── mentor/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── profile.blade.php
│   │   │   └── mentorships.blade.php
│   │   ├── employer/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── profile.blade.php
│   │   │   ├── jobs.blade.php
│   │   │   └── candidates.blade.php
│   │   ├── admin/
│   │   │   ├── dashboard.blade.php
│   │   │   ├── users.blade.php
│   │   │   └── jobs.blade.php
│   │   ├── components/
│   │   │   ├── navbar.blade.php
│   │   │   ├── sidebar.blade.php
│   │   │   ├── job-card.blade.php
│   │   │   ├── mentor-card.blade.php
│   │   │   └── assessment-card.blade.php
│   │   └── welcome.blade.php
│   ├── js/
│   │   ├── app.js
│   │   ├── auth.js
│   │   ├── dashboard.js
│   │   ├── jobs.js
│   │   ├── assessments.js
│   │   └── profile.js
│   └── css/
│       └── app.css
├── routes/
│   ├── web.php
│   ├── api.php
│   └── auth.php
├── config/
│   ├── database.php
│   ├── services.php
│   └── app.php
├── public/
│   ├── css/
│   ├── js/
│   ├── images/
│   └── index.php
└── .env.example
```

## 🗄️ Database Schema

### Users Table
```sql
CREATE TABLE users (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role ENUM('STUDENT', 'MENTOR', 'EMPLOYER', 'ADMIN') DEFAULT 'STUDENT',
    email_verified_at TIMESTAMP NULL,
    remember_token VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);
```

### Students Table
```sql
CREATE TABLE students (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id BIGINT UNSIGNED UNIQUE NOT NULL,
    bio TEXT,
    university VARCHAR(255),
    course VARCHAR(255),
    graduation_year YEAR,
    location VARCHAR(255),
    career_goals TEXT,
    profile_image VARCHAR(255),
    resume_url VARCHAR(255),
    linkedin_url VARCHAR(255),
    github_url VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE
);
```

### Jobs Table
```sql
CREATE TABLE jobs (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    employer_id BIGINT UNSIGNED NOT NULL,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    requirements TEXT,
    location VARCHAR(255) NOT NULL,
    job_type ENUM('FULL_TIME', 'PART_TIME', 'INTERNSHIP', 'CONTRACT', 'FREELANCE', 'APPRENTICESHIP') DEFAULT 'FULL_TIME',
    salary VARCHAR(255),
    is_remote BOOLEAN DEFAULT FALSE,
    is_hybrid BOOLEAN DEFAULT FALSE,
    external_api_id VARCHAR(255),
    external_url VARCHAR(255),
    is_active BOOLEAN DEFAULT TRUE,
    application_deadline DATE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (employer_id) REFERENCES employers(id) ON DELETE CASCADE
);
```

## 🚀 Installation & Setup

### 1. Create Laravel Project
```bash
composer create-project laravel/laravel careerone
cd careerone
```

### 2. Configure Environment
```bash
cp .env.example .env
```

Edit `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=careerone
DB_USERNAME=root
DB_PASSWORD=

# Job API Keys
ADZUNA_APP_ID=your_adzuna_app_id
ADZUNA_API_KEY=your_adzuna_api_key
REED_API_KEY=your_reed_api_key

# Email Configuration
MAIL_MAILER=smtp
MAIL_HOST=mailpit
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS="hello@careerone.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### 3. Install Dependencies
```bash
composer require laravel/sanctum laravel/ui
npm install bootstrap @popperjs/core axios
```

### 4. Run Migrations
```bash
php artisan migrate
```

### 5. Seed Database
```bash
php artisan db:seed
```

### 6. Compile Assets
```bash
npm run build
```

### 7. Start Development Server
```bash
php artisan serve
```

## 🔧 Key Features Implementation

### 1. Authentication System
- Laravel Breeze for scaffolding
- Role-based middleware
- Email verification
- Password reset

### 2. Job Board with API Integration
- Adzuna API integration
- Reed API integration
- Advanced filtering (location, job type, salary)
- Hyperlocal job search
- Save job functionality

### 3. Skill Assessment Module
- Interactive quizzes
- Scoring system
- Progress tracking
- Personalized recommendations

### 4. Mentorship System
- Mentor profiles
- Connection requests
- Messaging system
- Availability management

### 5. Employer Dashboard
- Company profile management
- Job posting
- Candidate management
- Application tracking

## 📱 Frontend Implementation (Bootstrap 5)

### Main Layout Structure
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CareerOne - Student Career Development Platform</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    @include('components.navbar')
    
    <main class="container-fluid">
        @yield('content')
    </main>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
```

### Responsive Navigation
```html
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <i class="bi bi-briefcase-fill"></i> CareerOne
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('jobs.index') }}">Browse Jobs</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('mentors.index') }}">Find Mentors</a>
                </li>
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}">Logout</a></li>
                        </ul>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
```

## 🔄 API Integration Examples

### Job API Service
```php
<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class JobApiService
{
    public function fetchAdzunaJobs($params = [])
    {
        $response = Http::get('https://api.adzuna.com/v1/api/jobs/gb/search/1', [
            'app_id' => config('services.adzuna.app_id'),
            'app_key' => config('services.adzuna.api_key'),
            'results_per_page' => 20,
            'what' => $params['keyword'] ?? '',
            'where' => $params['location'] ?? '',
            'salary_min' => $params['salary_min'] ?? '',
            'salary_max' => $params['salary_max'] ?? '',
        ]);

        return $response->json();
    }

    public function fetchReedJobs($params = [])
    {
        $response = Http::withHeaders([
            'Authorization' => config('services.reed.api_key'),
        ])->get('https://www.reed.co.uk/api/1.0/search', [
            'keywords' => $params['keyword'] ?? '',
            'locationName' => $params['location'] ?? '',
            'salaryMin' => $params['salary_min'] ?? '',
            'salaryMax' => $params['salary_max'] ?? '',
            'resultsToTake' => 20,
        ]);

        return $response->json();
    }
}
```

## 📊 Security Features

1. **Authentication**: Laravel Sanctum for API authentication
2. **Authorization**: Role-based middleware
3. **Input Validation**: Laravel Form Requests
4. **CSRF Protection**: Built-in Laravel CSRF
5. **SQL Injection Prevention**: Eloquent ORM
6. **XSS Protection**: Laravel's escaping
7. **Password Security**: bcrypt hashing

## 🎯 Key Features Delivered

✅ **Multi-Role User Management**
✅ **Secure Authentication System**
✅ **Student Profile Management**
✅ **Job Board with API Integration**
✅ **Hyperlocal Job Search**
✅ **Skill Assessment Module**
✅ **Mentorship System**
✅ **Employer Dashboard**
✅ **Admin Panel**
✅ **Responsive Bootstrap UI**
✅ **MySQL Database**
✅ **API Integration (Adzuna, Reed)**

## 📱 Mobile-First Design

- Bootstrap 5 responsive grid system
- Mobile-optimized navigation
- Touch-friendly interfaces
- Progressive enhancement
- Cross-browser compatibility

This implementation follows your exact requirements and provides a solid foundation for the CareerOne platform using Laravel, MySQL, and Bootstrap 5.