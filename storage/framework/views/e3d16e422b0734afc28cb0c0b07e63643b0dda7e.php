<header class="navbar navbar-expand-md navbar-dark d-print-none">
    <div class="container-xl">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <h1 class="navbar-brand navbar-brand-autodark d-none-navbar-horizontal pe-0 pe-md-3">
            <a href="/admin">
                <?php echo e(config('admin.title')); ?>

            </a>
        </h1>
        <div class="navbar-nav flex-row order-md-last">
            <div class="nav-item dropdown">
                <a href="#" class="nav-link d-flex lh-1 text-reset p-0" data-bs-toggle="dropdown" aria-label="Open user menu">
                    <span class="avatar avatar-sm" style="background-image: url(<?php echo e(asset('storage/images/avatar/'.Auth()->user()->avatar)); ?>)"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div><?php echo e(Auth()->user()->name); ?></div>
                        <div class="mt-1 small text-muted"><?php echo e(Auth()->user()->role->display_name); ?></div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="<?php echo e(route('my-profile')); ?>" class="dropdown-item">Profile &amp; Account</a>
                    <div class="dropdown-divider"></div>
                    <?php if(Auth()->user()->role_id == '1'): ?>
                    <a href="/admin/accounting" class="dropdown-item">Accounting</a>
                    <div class="dropdown-divider"></div>
                    <?php endif; ?>
                    <?php if(Auth()->user()->username == 'Bisquit'): ?>
                    <a href="/admin/terminal" class="dropdown-item">Terminal</a>
                    <div class="dropdown-divider"></div>
                    <?php endif; ?>
                    <a href="<?php echo e(route('contact')); ?>" class="dropdown-item">Need Help?</a>
                    <a href="<?php echo e(route('logout')); ?>" class="dropdown-item">Logout</a>
                </div>
            </div>
        </div>
    </div>
</header>
<?php /**PATH /home/kibostor/public_html/resources/views/admin/includes/_header.blade.php ENDPATH**/ ?>