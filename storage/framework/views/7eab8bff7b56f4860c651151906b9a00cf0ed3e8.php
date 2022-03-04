

<?php $__env->startSection('title'); ?>
Home
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="row row-deck row-cards">
    <div class="col-12">
        <div class="row row-cards">
            <div class="col-sm-6 col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col">
                                <h4 class="card-title m-0">
                                    <span>Welcome, <?php echo e(Auth()->user()->username); ?>!</span>

                                </h4>
                                <div class="small mt-1">
                                    <span> Last Logged in : <?php echo e(Carbon\Carbon::parse( Auth()->user()->last_login_at )->diffForHumans()); ?> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-lime-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-building-bank" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <line x1="3" y1="21" x2="21" y2="21"></line>
                                       <line x1="3" y1="10" x2="21" y2="10"></line>
                                       <polyline points="5 6 12 3 19 6"></polyline>
                                       <line x1="4" y1="10" x2="4" y2="21"></line>
                                       <line x1="20" y1="10" x2="20" y2="21"></line>
                                       <line x1="8" y1="14" x2="8" y2="17"></line>
                                       <line x1="12" y1="14" x2="12" y2="17"></line>
                                       <line x1="16" y1="14" x2="16" y2="17"></line>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    <?php if(Auth()->user()->role_id == '1'): ?>
                                    Store Balance
                                    <?php else: ?>
                                    Your Balance
                                    <?php endif; ?>
                                </div>
                                <?php if(Auth()->user()->role_id == '1'): ?>
                                <div class="text-muted">
                                    Rp. <?php echo e(number_format($checkBalance['data']->deposit)); ?>

                                </div>
                                <?php else: ?>
                                <div class="text-muted">
                                    Rp. <?php echo e(number_format($usersbalance->balance)); ?>

                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-indigo-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-chart-line" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <line x1="4" y1="19" x2="20" y2="19"></line>
                                       <polyline points="4 15 8 9 12 11 16 6 20 10"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                     Used Balances
                                </div>
                                <div class="text-muted">
                                    Rp. <?php echo e(number_format($expenses)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-orange-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                     Total Users
                                </div>
                                <div class="text-muted">
                                    <?php echo e($countusers); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-2">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-dark-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clock" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="12" r="9"></circle>
                                        <polyline points="12 7 12 12 15 15"></polyline>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                    Server Time
                                </div>
                                <div class="text-muted" id="time">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-green-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-down" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <line x1="12" y1="5" x2="12" y2="19"></line>
                                       <line x1="16" y1="15" x2="12" y2="19"></line>
                                       <line x1="8" y1="15" x2="12" y2="19"></line>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                     Total Income
                                </div>
                                <div class="text-muted">
                                    Rp. <?php echo e(number_format($income)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-red-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-narrow-up" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <line x1="12" y1="5" x2="12" y2="19"></line>
                                       <line x1="16" y1="9" x2="12" y2="5"></line>
                                       <line x1="8" y1="9" x2="12" y2="5"></line>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                     Total Expense
                                </div>
                                <div class="text-muted">
                                    Rp. <?php echo e(number_format($outcome)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-cyan-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-coin" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="12" cy="12" r="9"></circle>
                                       <path d="M14.8 9a2 2 0 0 0 -1.8 -1h-2a2 2 0 0 0 0 4h2a2 2 0 0 1 0 4h-2a2 2 0 0 1 -1.8 -1"></path>
                                       <path d="M12 6v2m0 8v2"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                     Profit
                                </div>
                                <div class="text-muted">
                                    Rp. <?php echo e(number_format($profit)); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="card card-sm">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <span class="bg-dark-lt text-white avatar">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                       <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                       <circle cx="6" cy="19" r="2"></circle>
                                       <circle cx="17" cy="19" r="2"></circle>
                                       <path d="M17 17h-11v-14h-2"></path>
                                       <path d="M6 5l14 1l-1 7h-13"></path>
                                    </svg>
                                </span>
                            </div>
                            <div class="col">
                                <div class="font-weight-medium">
                                     Total Success Order
                                </div>
                                <div class="text-muted">
                                    <?php echo e($ordersuccess); ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">
                    Account Info
                </h3>
                <div class="card-actions">
                    <a href="<?php echo e(route('my-profile')); ?>">
                        Edit Account
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon ms-1" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3"></path>
                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3"></path>
                            <line x1="16" y1="5" x2="19" y2="8"></line>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <dl class="row">
                    <dt class="col-5">Name :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->name); ?></dd>
                    <dt class="col-5">Username :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->username); ?></dd>
                    <dt class="col-5">Role :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->role->display_name); ?></dd>
                    <dt class="col-5">Phone Number :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->phone); ?></dd>
                    <dt class="col-5">Created At :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->created_at); ?></dd>
                </dl>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Who's Online?</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <?php $__currentLoopData = $last_seen; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-sm-6">
                        <div class="row g-3 align-items-center">
                            <a class="col-auto">
                            </a>
                            <div class="col text-truncate">
                                <span class="text-body d-block text-truncate"><?php echo e($users->username); ?> </span>
                                <?php if(Cache::has('user-is-online-' . $users->id)): ?>
                                <span class="badge bg-green"></span>
                                <small class="text-muted text-truncate mt-n1">Online</small>
                                <?php else: ?>
                                <span class="badge bg-red"></span>
                                <small class="text-muted text-truncate mt-n1">Last Online : <?php echo e(Carbon\Carbon::parse($users->last_seen)->diffForHumans()); ?></small>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/dashboard.blade.php ENDPATH**/ ?>