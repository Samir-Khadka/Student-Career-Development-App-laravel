

<?php $__env->startSection('title', 'Dashboard - CareerOne'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 mb-4">
        <h2 class="fw-bold">Dashboard</h2>
        <p class="text-muted">Welcome back, <?php echo e(auth()->user()->name); ?>!</p>
    </div>
</div>

<div class="row">
    <?php if(auth()->user()->role === 'EMPLOYER'): ?>
        <!-- Employer Stats -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-briefcase text-primary fs-4"></i>
                        </div>
                        <h5 class="card-title mb-0">Active Jobs</h5>
                    </div>
                    <h2 class="fw-bold"><?php echo e(auth()->user()->employer ? auth()->user()->employer->jobs->count() : 0); ?></h2>
                    <p class="text-muted small mb-0">Jobs posted</p>
                    <a href="<?php echo e(route('employer.jobs.create')); ?>" class="btn btn-primary w-100 mt-3"><i class="bi bi-plus-lg me-1"></i> Post a Job</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-people text-success fs-4"></i>
                        </div>
                        <h5 class="card-title mb-0">Applications</h5>
                    </div>
                    <h2 class="fw-bold">0</h2>
                    <p class="text-muted small mb-0">Total candidates</p>
                </div>
            </div>
        </div>
    <?php elseif(auth()->user()->role === 'MENTOR'): ?>
        <!-- Mentor Stats -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-calendar-check text-primary fs-4"></i>
                        </div>
                        <h5 class="card-title mb-0">Sessions</h5>
                    </div>
                    <h2 class="fw-bold">0</h2>
                    <p class="text-muted small mb-0">Completed sessions</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-chat-dots text-info fs-4"></i>
                        </div>
                        <h5 class="card-title mb-0">Requests</h5>
                    </div>
                    <h2 class="fw-bold">0</h2>
                    <p class="text-muted small mb-0">Pending mentorship requests</p>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Student Stats -->
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-briefcase text-primary fs-4"></i>
                        </div>
                        <h5 class="card-title mb-0">Applied Jobs</h5>
                    </div>
                    <h2 class="fw-bold">0</h2>
                    <p class="text-muted small mb-0">Applications under review</p>
                    <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-outline-primary w-100 mt-3">Browse Jobs</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body">
                    <div class="d-flex align-items-center mb-3">
                        <div class="bg-info bg-opacity-10 p-3 rounded-circle me-3">
                            <i class="bi bi-people text-info fs-4"></i>
                        </div>
                        <h5 class="card-title mb-0">Mentors</h5>
                    </div>
                    <h2 class="fw-bold">0</h2>
                    <p class="text-muted small mb-0">Connected mentors</p>
                    <span class="text-muted small d-block mt-2">Find Mentors (Coming Soon)</span>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>

<div class="row mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">Recent Activity</h5>
            </div>
            <div class="card-body">
                <div class="text-center py-5">
                    <i class="bi bi-inbox text-muted fs-1 mb-3 d-block"></i>
                    <p class="text-muted">No recent activity to show.</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card shadow-sm border-0 bg-primary text-white">
            <div class="card-body p-4">
                <h4 class="fw-bold mb-3">Complete Your Profile</h4>
                <p class="mb-4">Stand out to employers by adding your education, skills, and experience.</p>
                <a href="<?php echo e(route('profile')); ?>" class="btn btn-light w-100 fw-bold">Update Profile</a>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\Student Career Development App\resources\views/dashboard.blade.php ENDPATH**/ ?>