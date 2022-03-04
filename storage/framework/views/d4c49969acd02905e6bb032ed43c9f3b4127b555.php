

<?php $__env->startSection('title'); ?>
My Profile
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="row row-cards">
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <dl class="row">
                    <dt class="col-5">Name :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->name); ?></dd>
                    <dt class="col-5">Username :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->username); ?></dd>
                    <dt class="col-5">Role :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->role->display_name); ?></dd>
                    <dt class="col-5">Email :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->email); ?></dd>
                    <dt class="col-5">Phone Number :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->phone); ?></dd>
                    <dt class="col-5">Created At :</dt>
                    <dd class="col-7"><?php echo e(Auth()->user()->created_at); ?></dd>
                </dl>
            </div>
        </div>
        <div class="card mt-2">
            <div class="card-header">
                <h3 class="card-title">Badges Achieve</h3>
            </div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-6">
                        <div class="row g-3 align-items-center">
                            <span class="avatar rounded-circle" style="background-image: url(<?php echo e(asset('storage/')); ?>)"></span>
                            <div class="col text-truncate">
                                <b class="text-body d-block text-truncate">Test</b>
                                <small class="text-muted text-truncate mt-n1">Test</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <div class="tab-content">
                    <div class="tab-pane <?php if($errors->first('avatar')): ?> show active  <?php else: ?> active <?php endif; ?>" id="edit">
                        <div class="col-sm-12">
                            <div class="card">
                                <ul class="nav nav-tabs nav-fill" data-bs-toggle="tabs">
                                    <li class="nav-item">
                                        <a href="#tabs-information" class="nav-link <?php if($errors->has('old_password')): ?> <?php elseif($errors->has('password')): ?> <?php elseif($errors->has('password_confirmation')): ?> <?php else: ?> active <?php endif; ?>" data-bs-toggle="tab">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                                <line x1="19" y1="7" x2="19" y2="10"></line>
                                                <line x1="19" y1="14" x2="19" y2="14.01"></line>
                                            </svg>
                                            Public Information</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#tabs-password" class="nav-link <?php if($errors->has('old_password')): ?> active <?php elseif($errors->has('password')): ?> active <?php elseif($errors->has('password_confirmation')): ?> active <?php else: ?> <?php endif; ?>" data-bs-toggle="tab">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon me-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <rect x="5" y="11" width="14" height="10" rx="2"></rect>
                                                <circle cx="12" cy="16" r="1"></circle>
                                                <path d="M8 11v-4a4 4 0 0 1 8 0v4"></path>
                                            </svg>
                                            Password</a>
                                    </li>
                                </ul>
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="tab-pane <?php if($errors->has('old_password')): ?> <?php elseif($errors->has('password')): ?> <?php elseif($errors->has('password_confirmation')): ?> <?php else: ?> show active <?php endif; ?>" id="tabs-information">
                                            <form action="/admin/my-profile-info/<?php echo e(Auth::user()->id); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
                                                <?php echo e(csrf_field()); ?>

                                                <div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Name</label>
                                                        <input name="name" type="text" class="form-control" value="<?php echo e(Auth::user()->name); ?>">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Username</label>
                                                        <input name="username" type="text" class="form-control" value="<?php echo e(Auth::user()->username); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input name="email" type="email" class="form-control <?php if($errors->has('email')): ?> is-invalid <?php endif; ?>" value="<?php echo e(Auth::user()->email); ?>" required>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('email')); ?></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input value="<?php echo e(Auth::user()->phone); ?>" type="text" name="phone" class="form-control" data-mask="0000 0000 0000" placeholder="0123 4567 8910" autocomplete="off">
                                                    </div>
                                                    <div class="mb-3">
                                                        <div class="form-label">Profile Picture</div>
                                                        <input type="file" class="form-control <?php if($errors->has('avatar')): ?> is-invalid <?php endif; ?>" value="ea" name="avatar">
                                                        <div class="invalid-feedback"><?php echo e($errors->first('avatar')); ?></div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button class="btn btn-outline-yellow" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                        </svg>
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane <?php if($errors->has('old_password')): ?> show active <?php elseif($errors->has('password')): ?> show active <?php elseif($errors->has('password_confirmation')): ?> show active <?php else: ?> <?php endif; ?>" id="tabs-password">
                                            <form action="/admin/my-profile-password/<?php echo e(Auth::user()->id); ?>" method="POST" autocomplete="off">
                                                <?php echo e(csrf_field()); ?>

                                                <div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Current Password</label>
                                                        <input name="old_password" type="password" class="form-control <?php if($errors->has('old_password')): ?> is-invalid <?php endif; ?>" placeholder="" required>
                                                        <div class="invalid-feedback"><?php echo e($errors->first('old_password')); ?></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <input name="password" type="password" class="form-control <?php if($errors->has('password')): ?> is-invalid <?php endif; ?>" placeholder="">
                                                        <div class="invalid-feedback"><?php echo e($errors->first('password')); ?></div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm New Password</label>
                                                        <input name="password_confirmation" type="password" class="form-control <?php if($errors->has('password_confirmation')): ?> is-invalid <?php endif; ?>" placeholder="">
                                                        <div class="invalid-feedback"><?php echo e($errors->first('password_confirmation')); ?></div>
                                                    </div>
                                                </div>
                                                <div class="mt-3">
                                                    <button class="btn btn-outline-yellow" type="submit">
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4"></path>
                                                            <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4"></path>
                                                        </svg>
                                                        Update
                                                    </button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/kibostor/public_html/resources/views/admin/my-profile/index.blade.php ENDPATH**/ ?>