

<?php $__env->startSection('title', 'Find Mentors - CareerOne'); ?>

<?php $__env->startSection('content'); ?>
<div class="row mb-4">
    <div class="col-md-8">
        <h2 class="fw-bold">Find a Mentor</h2>
        <p class="text-muted">Connect with experienced professionals to guide your career journey.</p>
    </div>
</div>

<div class="row">
    <?php $__empty_1 = true; $__currentLoopData = $mentors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mentor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
        <div class="col-md-4 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body text-center p-4">
                    <div class="mb-3">
                        <?php if($mentor->user->profile_photo_path): ?>
                            <img src="<?php echo e(asset('storage/' . $mentor->user->profile_photo_path)); ?>" class="rounded-circle" style="width: 80px; height: 80px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center" style="width: 80px; height: 80px; font-size: 2rem;">
                                <?php echo e(substr($mentor->user->name, 0, 1)); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <h5 class="fw-bold mb-1"><?php echo e($mentor->user->name); ?></h5>
                    <p class="text-primary mb-2"><?php echo e($mentor->position); ?> at <?php echo e($mentor->company); ?></p>
                    <p class="text-muted small"><?php echo e(Str::limit($mentor->biography, 100)); ?></p>
                    <div class="mt-3">
                        <span class="badge bg-light text-dark"><?php echo e($mentor->industry); ?></span>
                        <span class="badge bg-light text-dark"><?php echo e($mentor->years_of_experience); ?> Years Exp.</span>
                    </div>
                    <button class="btn btn-outline-primary w-100 mt-4">Request Mentorship</button>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <div class="col-12 text-center py-5">
            <h3 class="text-muted">No mentors found yet.</h3>
            <p>Check back later!</p>
        </div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\Student Career Development App\resources\views/mentors/index.blade.php ENDPATH**/ ?>