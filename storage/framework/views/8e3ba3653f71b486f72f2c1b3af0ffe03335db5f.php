<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
            <div class="container-xl">
                <ul class="navbar-nav">
                    <!-- Home -->
                    <li class="nav-item <?php echo e((request()->is('admin')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('dashboard')); ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-home-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <polyline points="5 12 3 12 12 3 21 12 19 12"></polyline>
                                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"></path>
                                    <rect x="10" y="12" width="4" height="4"></rect>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Home
                            </span>
                        </a>
                    </li>

                    <!-- Order -->
                    
                     <li class="nav-item <?php echo e((request()->is('admin/order*')) ? 'active' : ''); ?> dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-shopping-cart" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="6" cy="19" r="2"></circle>
                                    <circle cx="17" cy="19" r="2"></circle>
                                    <path d="M17 17h-11v-14h-2"></path>
                                    <path d="M6 5l14 1l-1 7h-13"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Order
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('order')); ?>">
                                New Order
                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('order-history')); ?>">
                                History
                            </a>
                        </div>
                    </li>

                    <?php if(Auth()->user()->role->name == 'owner'): ?>

                    <!-- Games -->
                    <li class="nav-item <?php echo e((request()->is('admin/games*')) ? 'active' : ''); ?> <?php echo e((request()->is('admin/products*')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('games')); ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-gamepad" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                                    <path d="M6 12h4m-2 -2v4"></path>
                                    <line x1="15" y1="11" x2="15" y2="11.01"></line>
                                    <line x1="18" y1="13" x2="18" y2="13.01"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Games
                            </span>
                        </a>
                    </li>

                    <!-- Deposit -->
                    <li class="nav-item <?php echo e((request()->is('admin/deposit*')) ? 'active' : ''); ?> dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="3" y="5" width="18" height="14" rx="3"></rect>
                                    <line x1="3" y1="10" x2="21" y2="10"></line>
                                    <line x1="7" y1="15" x2="7.01" y2="15"></line>
                                    <line x1="11" y1="15" x2="13" y2="15"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Store Balance
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('deposit')); ?>">
                                Deposit
                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('history-deposit')); ?>">
                                History
                            </a>
                        </div>
                    </li>


                    <?php endif; ?>

                    <li class="nav-item <?php echo e((request()->is('admin/users*')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('users')); ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-users" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <circle cx="9" cy="7" r="4"></circle>
                                    <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                    <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Users
                            </span>
                        </a>
                    </li>

                    <?php if(Auth()->user()->role->name == 'owner'): ?>

                    <li class="nav-item <?php echo e((request()->is('admin/auth*')) ? 'active' : ''); ?> dropdown">
                        <a class="nav-link dropdown-toggle" href="#navbar-extra" data-bs-toggle="dropdown" data-bs-auto-close="outside" role="button" aria-expanded="false">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-lock-access" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 8v-2a2 2 0 0 1 2 -2h2"></path>
                                    <path d="M4 16v2a2 2 0 0 0 2 2h2"></path>
                                    <path d="M16 4h2a2 2 0 0 1 2 2v2"></path>
                                    <path d="M16 20h2a2 2 0 0 0 2 -2v-2"></path>
                                    <rect x="8" y="11" width="8" height="5" rx="1"></rect>
                                    <path d="M10 11v-2a2 2 0 1 1 4 0v2"></path>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Authentication
                            </span>
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo e(route('auth.roles')); ?>">
                                Roles
                            </a>
                            <a class="dropdown-item" href="<?php echo e(route('auth.users')); ?>">
                                Users
                            </a>
                        </div>
                    </li>

                    <?php endif; ?>
                    <li class="nav-item <?php echo e((request()->is('admin/winrate*')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('winrate')); ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calculator" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <rect x="4" y="3" width="16" height="18" rx="2"></rect>
                                    <rect x="8" y="7" width="8" height="3" rx="1"></rect>
                                    <line x1="8" y1="14" x2="8" y2="14.01"></line>
                                    <line x1="12" y1="14" x2="12" y2="14.01"></line>
                                    <line x1="16" y1="14" x2="16" y2="14.01"></line>
                                    <line x1="8" y1="17" x2="8" y2="17.01"></line>
                                    <line x1="12" y1="17" x2="12" y2="17.01"></line>
                                    <line x1="16" y1="17" x2="16" y2="17.01"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Win Rate
                            </span>
                        </a>
                    </li>
                    <li class="nav-item <?php echo e((request()->is('admin/changelog*')) ? 'active' : ''); ?>">
                        <a class="nav-link" href="<?php echo e(route('changelog')); ?>">
                            <span class="nav-link-icon d-md-none d-lg-inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
                                    <line x1="12" y1="11" x2="12" y2="17"></line>
                                    <line x1="9" y1="14" x2="15" y2="14"></line>
                                </svg>
                            </span>
                            <span class="nav-link-title">
                                Changelog
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/kibostor/public_html/resources/views/admin/includes/_navbar.blade.php ENDPATH**/ ?>