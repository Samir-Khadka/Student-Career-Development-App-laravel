@extends('layouts.app')

@section('title', 'Welcome - CareerOne')

@section('content')
<div class="hero-section bg-gradient text-white py-5 mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <h1 class="display-4 fw-bold mb-4">Your Bridge from University to Career</h1>
                <p class="lead mb-4">Navigate your career journey with confidence. Access job opportunities, skill assessments, mentorship, and employer connections—all in one platform.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('register') }}" class="btn btn-light btn-lg">
                        <i class="bi bi-rocket-takeoff me-2"></i> Start Your Journey
                    </a>
                    <a href="{{ route('jobs.index') }}" class="btn btn-outline-light btn-lg">
                        <i class="bi bi-search me-2"></i> Explore Jobs
                    </a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <i class="bi bi-briefcase-fill" style="font-size: 8rem;"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <!-- Stats Section -->
    <section class="stats-section py-5">
        <div class="row text-center">
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <h2 class="text-primary fw-bold">500+</h2>
                    <p class="text-muted">Active Students</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <h2 class="text-success fw-bold">100+</h2>
                    <p class="text-muted">Industry Mentors</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <h2 class="text-info fw-bold">50+</h2>
                    <p class="text-muted">Partner Companies</p>
                </div>
            </div>
            <div class="col-md-3 col-6 mb-4">
                <div class="stat-card">
                    <h2 class="text-warning fw-bold">85%</h2>
                    <p class="text-muted">Success Rate</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">Everything You Need for Career Success</h2>
            <p class="lead text-muted">Our integrated platform provides all the tools and resources you need to successfully transition from university to your dream career.</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-briefcase text-primary" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="card-title">Smart Job Board</h5>
                        <p class="card-text">Access curated job listings with advanced filtering and hyperlocal opportunities</p>
                        <ul class="list-unstyled text-start small">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Hyperlocal job search</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Advanced filtering</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Direct employer applications</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-graph-up text-success" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="card-title">Skill Assessment</h5>
                        <p class="card-text">Identify your strengths and bridge skill gaps with personalized assessments</p>
                        <ul class="list-unstyled text-start small">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Comprehensive skill tests</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Personalized recommendations</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Progress tracking</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 shadow-sm hover-shadow">
                    <div class="card-body text-center p-4">
                        <div class="feature-icon mb-3">
                            <i class="bi bi-people text-info" style="font-size: 3rem;"></i>
                        </div>
                        <h5 class="card-title">Mentorship Network</h5>
                        <p class="card-text">Connect with experienced professionals who can guide your career journey</p>
                        <ul class="list-unstyled text-start small">
                            <li><i class="bi bi-check-circle text-success me-2"></i>Industry expert mentors</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>1-on-1 guidance</li>
                            <li><i class="bi bi-check-circle text-success me-2"></i>Career advice and support</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works py-5">
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold mb-3">How CareerOne Works</h2>
            <p class="lead text-muted">Get started in minutes and take control of your career journey</p>
        </div>
        
        <div class="row g-4">
            <div class="col-md-3">
                <div class="text-center">
                    <div class="step-number mb-3">
                        <span class="badge bg-primary text-white rounded-circle p-3" style="font-size: 1.5rem;">1</span>
                    </div>
                    <h5>Sign Up</h5>
                    <p class="text-muted">Create your free account and build your professional profile</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="step-number mb-3">
                        <span class="badge bg-primary text-white rounded-circle p-3" style="font-size: 1.5rem;">2</span>
                    </div>
                    <h5>Assess Skills</h5>
                    <p class="text-muted">Take skill assessments to identify your strengths and areas for growth</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="step-number mb-3">
                        <span class="badge bg-primary text-white rounded-circle p-3" style="font-size: 1.5rem;">3</span>
                    </div>
                    <h5>Connect & Apply</h5>
                    <p class="text-muted">Connect with mentors and apply for jobs that match your profile</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center">
                    <div class="step-number mb-3">
                        <span class="badge bg-primary text-white rounded-circle p-3" style="font-size: 1.5rem;">4</span>
                    </div>
                    <h5>Land Your Dream Job</h5>
                    <p class="text-muted">Get hired and start your professional career with confidence</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

@push('styles')
<style>
.hero-section {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
}

.stat-card h2 {
    font-size: 2.5rem;
}

.feature-icon {
    color: #0d6efd;
}

.step-number {
    margin: 0 auto;
    width: 60px;
    height: 60px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.hover-shadow {
    transition: box-shadow 0.3s ease;
}

.hover-shadow:hover {
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}
</style>
@endpush