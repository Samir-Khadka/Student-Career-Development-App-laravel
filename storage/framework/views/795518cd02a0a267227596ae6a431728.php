

<?php $__env->startSection('title', $job->title . ' - CareerOne'); ?>

<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-lg-8">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body p-4">
                <div class="d-flex align-items-center mb-4">
                    <div class="bg-light rounded p-3 me-3 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                        <i class="bi bi-building text-primary fs-2"></i>
                    </div>
                    <div>
                        <h2 class="fw-bold mb-1"><?php echo e($job->title); ?></h2>
                        <h5 class="text-muted mb-2"><?php echo e($job->employer->name ?? 'Company Name'); ?></h5>
                        <div class="d-flex gap-2">
                            <span class="badge bg-light text-dark border"><i class="bi bi-geo-alt me-1"></i> <?php echo e($job->location ?? 'Remote'); ?></span>
                            <span class="badge bg-light text-dark border"><i class="bi bi-clock me-1"></i> <?php echo e($job->type); ?></span>
                            <span class="badge bg-light text-dark border"><i class="bi bi-cash me-1"></i> <?php echo e($job->salary_range ?? 'Negotiable'); ?></span>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <h5 class="fw-bold mb-3">Job Description</h5>
                <div class="text-muted mb-4">
                    <p><?php echo e($job->description); ?></p>
                </div>

                <h5 class="fw-bold mb-3">Requirements</h5>
                <div class="text-muted mb-4">
                    <p><?php echo e($job->requirements ?? 'No specific requirements listed.'); ?></p>
                </div>

                <hr class="my-4">

                <div class="d-flex gap-2">
                    <form action="<?php echo e(route('jobs.apply', $job->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-primary btn-lg">Apply Now</button>
                    </form>
                    <form action="<?php echo e(route('jobs.save', $job->id)); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="btn btn-outline-secondary btn-lg">
                            <i class="bi bi-bookmark"></i> Save Job
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-header bg-white py-3">
                <h5 class="card-title mb-0">About the Company</h5>
            </div>
            <div class="card-body p-4">
                <h5 class="fw-bold"><?php echo e($job->employer->name ?? 'Company'); ?></h5>
                <p class="text-muted mb-4"><?php echo e($job->employer->description ?? 'No company description available.'); ?></p>
                
                <h6 class="fw-bold mb-2">Website</h6>
                <a href="#" class="text-decoration-none mb-3 d-block"><?php echo e($job->employer->website ?? 'Not available'); ?></a>
                
                <h6 class="fw-bold mb-2">Industry</h6>
                <p class="text-muted mb-0"><?php echo e($job->employer->industry ?? 'Technology'); ?></p>
            </div>
        </div>

        <div class="d-grid">
            <a href="<?php echo e(route('jobs.index')); ?>" class="btn btn-outline-secondary">
                <i class="bi bi-arrow-left me-2"></i> Back to Jobs
            </a>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\Student Career Development App\resources\views/jobs/show.blade.php ENDPATH**/ ?>