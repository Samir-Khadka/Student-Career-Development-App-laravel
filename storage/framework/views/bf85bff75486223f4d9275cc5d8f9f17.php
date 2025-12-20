

<?php $__env->startSection('title', 'My Profile - CareerOne'); ?>

<?php $__env->startSection('content'); ?>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h5 class="card-title mb-0">My Profile</h5>
                <span class="badge bg-primary"><?php echo e(auth()->user()->role); ?></span>
            </div>
            <div class="card-body p-4">
                <form>
                    <div class="mb-4 text-center">
                        <?php if(auth()->user()->profile_photo_path): ?>
                            <img src="<?php echo e(asset('storage/' . auth()->user()->profile_photo_path)); ?>" 
                                 alt="<?php echo e(auth()->user()->name); ?>" 
                                 class="rounded-circle mb-3"
                                 style="width: 100px; height: 100px; object-fit: cover;">
                        <?php else: ?>
                            <div class="bg-primary text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 100px; height: 100px; font-size: 2.5rem;">
                                <?php echo e(substr(auth()->user()->name, 0, 1)); ?>

                            </div>
                        <?php endif; ?>
                        <h4 class="fw-bold"><?php echo e(auth()->user()->name); ?></h4>
                        <p class="text-muted"><?php echo e(auth()->user()->email); ?></p>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Full Name</label>
                            <p class="form-control-plaintext border-bottom pb-2"><?php echo e(auth()->user()->name); ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Email Address</label>
                            <p class="form-control-plaintext border-bottom pb-2"><?php echo e(auth()->user()->email); ?></p>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Role</label>
                            <p class="form-control-plaintext border-bottom pb-2"><?php echo e(auth()->user()->role); ?></p>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-bold">Joined On</label>
                            <p class="form-control-plaintext border-bottom pb-2"><?php echo e(auth()->user()->created_at->format('M d, Y')); ?></p>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex justify-content-end gap-2">
                        <button type="button" class="btn btn-outline-secondary">Change Password</button>
                        <a href="<?php echo e(route('profile.edit')); ?>" class="btn btn-primary">Edit Profile</a>
                    </div>
                </form>
            </div>
        </div>
        
        <div class="text-center mt-4">
            <form action="<?php echo e(route('logout')); ?>" method="POST" class="d-inline">
                <?php echo csrf_field(); ?>
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                </button>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Programs\Student Career Development App\resources\views/profile.blade.php ENDPATH**/ ?>