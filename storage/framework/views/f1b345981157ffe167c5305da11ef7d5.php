

<?php $__env->startSection('title', 'Browse Jobs - CareerOne'); ?>

<?php $__env->startSection('content'); ?>
<form action="<?php echo e(route('jobs.index')); ?>" method="GET">
<div class="row mb-4 align-items-center">
    <div class="col-md-6">
        <h2 class="fw-bold mb-0">Browse Jobs</h2>
        <p class="text-muted mb-0">Find your next career opportunity</p>
    </div>
    <div class="col-md-6 text-md-end mt-3 mt-md-0">
        <div class="d-inline-flex gap-2">
            <input type="text" name="title" class="form-control" placeholder="Search jobs..." value="<?php echo e(request('title')); ?>">
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-3 mb-4">
        <!-- Filters Sidebar -->
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">Filters</h5>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-bold">Job Type</label>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_type[]" value="FULL_TIME" id="fulltime" <?php echo e(in_array('FULL_TIME', request('job_type', [])) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="fulltime">Full Time</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_type[]" value="PART_TIME" id="parttime" <?php echo e(in_array('PART_TIME', request('job_type', [])) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="parttime">Part Time</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_type[]" value="INTERNSHIP" id="internship" <?php echo e(in_array('INTERNSHIP', request('job_type', [])) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="internship">Internship</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_type[]" value="CONTRACT" id="contract" <?php echo e(in_array('CONTRACT', request('job_type', [])) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="contract">Contract</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="job_type[]" value="FREELANCE" id="freelance" <?php echo e(in_array('FREELANCE', request('job_type', [])) ? 'checked' : ''); ?>>
                        <label class="form-check-label" for="freelance">Freelance</label>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="form-label fw-bold">Location</label>
                     <input type="text" name="location" class="form-control form-control-sm" placeholder="e.g. Kathmandu" value="<?php echo e(request('location')); ?>">
                </div>

                <button type="submit" class="btn btn-primary w-100">Apply Filters</button>
                <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-link w-100 text-decoration-none text-muted">Reset Filters</a>
                <!-- Add more filters as needed -->
            </div>
        </div>
    </div>

    <div class="col-lg-9">
        <?php if($jobs->count() > 0): ?>
            <?php $__currentLoopData = $jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="card shadow-sm border-0 mb-3 hover-shadow transition-all">
                    <div class="card-body p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="d-flex">
                                <div class="bg-light rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 60px; height: 60px;">
                                    <i class="bi bi-building text-primary fs-3"></i>
                                </div>
                                <div>
                                    <h5 class="fw-bold mb-1"><?php echo e($job->title); ?></h5>
                                    <p class="text-muted mb-2"><?php echo e($job->employer->name ?? 'Company Name'); ?> • <?php echo e($job->location ?? 'Location'); ?></p>
                                    <div class="d-flex gap-2 mb-2">
                                        <span class="badge bg-light text-dark border"><?php echo e($job->type); ?></span>
                                        <span class="badge bg-light text-dark border"><?php echo e($job->salary_range ?? 'Salary Negotiable'); ?></span>
                                    </div>
                                    <p class="text-muted small mb-0 line-clamp-2"><?php echo e(Str::limit($job->description, 150)); ?></p>
                                </div>
                            </div>
                            <div class="text-end">
                                <span class="badge bg-success bg-opacity-10 text-success mb-2">New</span>
                                <br>
                                <a href="<?php echo e(route('jobs.show', $job->id)); ?>" class="btn btn-outline-primary btn-sm">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <div class="mt-4">
                <?php echo e($jobs->links()); ?>

            </div>
        <?php else: ?>
            <div class="card shadow-sm border-0">
                <div class="card-body text-center py-5">
                    <div class="bg-light rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                        <i class="bi bi-briefcase text-muted fs-1"></i>
                    </div>
                    <h4>No jobs found</h4>
                    <p class="text-muted">Try adjusting your search criteria or check back later.</p>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\Student Career Development App\resources\views/jobs/index.blade.php ENDPATH**/ ?>