<?php $__env->startSection('title', 'CareerOne - Launch Your Future'); ?>

<?php $__env->startSection('content'); ?>
<!-- Hero Section -->
<div class="hero-section text-white d-flex align-items-center position-relative overflow-hidden" style="min-height: 85vh;">
    <!-- Abstract Shapes for Background -->
    <div class="position-absolute shape-1 rounded-circle bg-white" style="width: 300px; height: 300px; top: -50px; left: -50px; opacity: 0.1;"></div>
    <div class="position-absolute shape-2 rounded-circle bg-info" style="width: 400px; height: 400px; bottom: -100px; right: -100px; opacity: 0.1;"></div>

    <div class="container position-relative z-1">
        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 animate-fade-in-up">
                <span class="badge bg-white bg-opacity-25 text-white border border-white border-opacity-25 rounded-pill px-3 py-2 mb-4">
                    <i class="bi bi-stars me-2 text-warning"></i> #1 Career Platform for Students
                </span>
                <h1 class="display-3 fw-bold mb-4 lh-sm">Launch Your Career <br> While Still in <span class="text-warning">University</span></h1>
                <p class="lead mb-5 opacity-90">CareerOne bridges the gap between academia and industry. Connect with top employers, find mentors, and showcase your skills to land your dream job.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <?php if(auth()->guard()->guest()): ?>
                        <a href="<?php echo e(route('register')); ?>" class="btn btn-light btn-lg rounded-pill px-4 fw-bold shadow-lg hover-transform">
                            Get Started <i class="bi bi-arrow-right ms-2"></i>
                        </a>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-outline-light btn-lg rounded-pill px-4 fw-medium hover-transform">
                            Sign In
                        </a>
                    <?php else: ?>
                        <a href="<?php echo e(route('dashboard')); ?>" class="btn btn-light btn-lg rounded-pill px-4 fw-bold shadow-lg hover-transform">
                            Go to Dashboard <i class="bi bi-speedometer2 ms-2"></i>
                        </a>
                    <?php endif; ?>
                </div>
                <div class="mt-5 d-flex align-items-center gap-3">
                    <div class="d-flex">
                        <img src="https://ui-avatars.com/api/?name=John+Doe&background=random" class="rounded-circle border border-2 border-white" width="40" alt="">
                        <img src="https://ui-avatars.com/api/?name=Jane+Doe&background=random" class="rounded-circle border border-2 border-white ms-n3" width="40" alt="" style="margin-left: -15px;">
                        <img src="https://ui-avatars.com/api/?name=Sam+Smith&background=random" class="rounded-circle border border-2 border-white ms-n3" width="40" alt="" style="margin-left: -15px;">
                        <div class="rounded-circle bg-white text-dark border border-2 border-white d-flex align-items-center justify-content-center fw-bold fs-7 ms-n3" style="width: 40px; height: 40px; margin-left: -15px;">+5k</div>
                    </div>
                    <span class="text-white small">Trusted by 5,000+ students like you</span>
                </div>
            </div>
            <div class="col-lg-6 text-center animate-fade-in-up delay-100">
                <div class="position-relative">
                    <img src="https://illustrations.popsy.co/amber/student-going-to-school.svg" alt="Career Growth" class="img-fluid floating-animation" style="max-height: 500px;">
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Partners Section -->
<div class="bg-light py-4 border-bottom">
    <div class="container">
        <p class="text-center text-muted small fw-bold mb-3 text-uppercase tracking-wide">Trusted by leading companies</p>
        <div class="row justify-content-center align-items-center grayscale-logos opacity-50 g-4">
            <div class="col-6 col-md-2 text-center h4 fw-bold font-monospace mb-0">Google</div>
            <div class="col-6 col-md-2 text-center h4 fw-bold font-monospace mb-0">Microsoft</div>
            <div class="col-6 col-md-2 text-center h4 fw-bold font-monospace mb-0">Amazon</div>
            <div class="col-6 col-md-2 text-center h4 fw-bold font-monospace mb-0">Spotify</div>
            <div class="col-6 col-md-2 text-center h4 fw-bold font-monospace mb-0">Slack</div>
        </div>
    </div>
</div>

<!-- Features Section -->
<section class="py-6 overflow-hidden">
    <div class="container py-5">
        <div class="text-center mb-5 mw-760 mx-auto">
            <span class="text-primary fw-bold text-uppercase small tracking-wide">Why Choose CareerOne</span>
            <h2 class="display-5 fw-bold mt-2 mb-3">All the tools you need to succeed</h2>
            <p class="text-muted lead">We've built a comprehensive ecosystem to help you grow from a student into a professional.</p>
        </div>
        
        <div class="row g-4">
            <!-- Feature 1 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-hover transition-all rounded-4 overflow-hidden group">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-primary bg-opacity-10 text-primary rounded-circle mb-4 p-4 zoom-icon">
                            <i class="bi bi-briefcase fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Curated Jobs</h4>
                        <p class="text-muted mb-0">Access thousands of internships and entry-level positions tailored for students and fresh graduates.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                        <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-link text-decoration-none fw-bold icon-link">Find Jobs <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Feature 2 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-hover transition-all rounded-4 overflow-hidden group">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-success bg-opacity-10 text-success rounded-circle mb-4 p-4 zoom-icon">
                            <i class="bi bi-people fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Expert Mentorship</h4>
                        <p class="text-muted mb-0">Connect with industry leaders who have walked your path. Get 1-on-1 guidance and career advice.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                         <a href="<?php echo e(route('mentors.index')); ?>" class="btn btn-link text-decoration-none fw-bold icon-link link-success">Find a Mentor <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Feature 3 -->
            <div class="col-md-6 col-lg-4">
                <div class="card h-100 border-0 shadow-hover transition-all rounded-4 overflow-hidden group">
                    <div class="card-body p-4 p-lg-5 text-center">
                        <div class="d-inline-flex align-items-center justify-content-center bg-info bg-opacity-10 text-info rounded-circle mb-4 p-4 zoom-icon">
                            <i class="bi bi-graph-up-arrow fs-1"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Skill Assessment</h4>
                        <p class="text-muted mb-0">Validate your skills with our industry-standard tests and earn badges to stand out to employers.</p>
                    </div>
                    <div class="card-footer bg-transparent border-0 pb-4 text-center">
                         <a href="#" class="btn btn-link text-decoration-none fw-bold icon-link link-info">Test Skills <i class="bi bi-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Counter -->
<section class="py-5 bg-dark text-white position-relative overflow-hidden">
    <div class="position-absolute top-0 start-0 w-100 h-100 opacity-10" style="background-image: radial-gradient(#ffffff 1px, transparent 1px); background-size: 30px 30px;"></div>
    <div class="container position-relative z-1">
        <div class="row text-center g-4">
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold mb-0 text-primary">500+</h2>
                <p class="opacity-75 mb-0">Students Placed</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold mb-0 text-success">120+</h2>
                <p class="opacity-75 mb-0">Partner Companies</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold mb-0 text-warning">50+</h2>
                <p class="opacity-75 mb-0">Expert Mentors</p>
            </div>
            <div class="col-6 col-md-3">
                <h2 class="display-4 fw-bold mb-0 text-info">95%</h2>
                <p class="opacity-75 mb-0">Satisfaction Rate</p>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-6 bg-light">
    <div class="container py-5">
        <div class="text-center mb-5">
            <h2 class="fw-bold mb-3">Success Stories</h2>
            <p class="text-muted">Hear from students who kickstarted their careers with CareerOne.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm p-4 h-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                        </div>
                        <p class="card-text text-muted mb-4">"I never thought I could land an internship at a top tech company in my second year. CareerOne made it possible through their mentorship program!"</p>
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=Sarah+J&background=random" class="rounded-circle me-3" width="50" alt="Sarah">
                            <div>
                                <h6 class="fw-bold mb-0">Sarah Jenkins</h6>
                                <small class="text-muted">Software Intern @ TechCorp</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
             <div class="col-md-6 col-lg-4">
                <div class="card border-0 shadow-sm p-4 h-100 rounded-4">
                    <div class="card-body">
                        <div class="d-flex align-items-center mb-4">
                            <i class="bi bi-star-fill text-warning"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                            <i class="bi bi-star-fill text-warning ms-1"></i>
                        </div>
                        <p class="card-text text-muted mb-4">"The skill assessments really helped me identify what I needed to learn. The recommended courses were spot on."</p>
                        <div class="d-flex align-items-center">
                            <img src="https://ui-avatars.com/api/?name=David+M&background=random" class="rounded-circle me-3" width="50" alt="David">
                            <div>
                                <h6 class="fw-bold mb-0">David Miller</h6>
                                <small class="text-muted">Junior Analyst @ FinServe</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-5 bg-gradient text-white text-center">
    <div class="container py-4">
        <h2 class="display-6 fw-bold mb-4">Ready to Launch Your Career?</h2>
        <p class="lead mb-4 opacity-90 mx-auto" style="max-width: 600px;">Join thousands of students and employers building the future of work together. It's free to get started.</p>
        <div class="d-flex justify-content-center gap-3">
            <a href="<?php echo e(route('register')); ?>" class="btn btn-light btn-lg rounded-pill px-5 fw-bold shadow-lg hover-transform text-primary">Get Started Now</a>
        </div>
        <p class="small opacity-75 mt-3">No credit card required • Free for students</p>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('styles'); ?>
<style>
/* Custom Animations & Styles */
.bg-gradient {
    background: linear-gradient(120deg, #4f46e5 0%, #7c3aed 100%);
}

.hero-section {
    position: relative;
    z-index: 1;
}

.floating-animation {
    animation: float 6s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-20px); }
    100% { transform: translateY(0px); }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
    opacity: 0;
    transform: translateY(20px);
}

.delay-100 {
    animation-delay: 0.2s;
}

@keyframes fadeInUp {
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.hover-transform:hover {
    transform: translateY(-3px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2) !important;
}

.shadow-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.08) !important;
}

.zoom-icon i {
    transition: transform 0.3s ease;
}

.group:hover .zoom-icon i {
    transform: scale(1.2);
}

.icon-link i {
    transition: transform 0.2s;
}

.icon-link:hover i {
    transform: translateX(5px);
}

.grayscale-logos {
    filter: grayscale(100%);
    transition: filter 0.3s;
}

.grayscale-logos:hover {
    filter: grayscale(0%);
    opacity: 1;
}

.tracking-wide {
    letter-spacing: 0.1em;
}

.mw-760 {
    max-width: 760px;
}
</style>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\Student Career Development App\resources\views/welcome.blade.php ENDPATH**/ ?>