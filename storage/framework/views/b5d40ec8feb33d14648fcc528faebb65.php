<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="<?php echo e(Auth::check() ? route('dashboard') : route('home')); ?>">
            <i class="bi bi-briefcase-fill me-2"></i>CareerOne
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('jobs.index')); ?>">
                        <i class="bi bi-search me-1"></i> Browse Jobs
                    </a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo e(route('mentors.index')); ?>">
                        <i class="bi bi-people me-1"></i> Find Mentors
                    </a>
                </li>
                
                <?php if(auth()->guard()->guest()): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?php echo e(route('login')); ?>">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-light text-primary px-3" href="<?php echo e(route('register')); ?>">
                            <i class="bi bi-person-plus me-1"></i> Get Started
                        </a>
                    </li>
                <?php else: ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle me-1"></i> <?php echo e(Auth::user()->name); ?>

                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="<?php echo e(route('dashboard')); ?>">
                                <i class="bi bi-speedometer2 me-2"></i> Dashboard
                            </a></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('profile')); ?>">
                                <i class="bi bi-person me-2"></i> Profile
                            </a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i> Logout
                            </a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
    
    <?php if(auth()->guard()->check()): ?>
        <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" class="d-none">
            <?php echo csrf_field(); ?>
        </form>
    <?php endif; ?>
</nav><?php /**PATH D:\Programs\Student Career Development App\resources\views/components/navbar.blade.php ENDPATH**/ ?>