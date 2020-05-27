<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini"><?php echo e(__('BD')); ?></a>
            <a href="#" class="simple-text logo-normal"><?php echo e(__('Black Dashboard')); ?></a>
        </div>
        <ul class="nav">
            <li <?php if($pageSlug = 'dashboard'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('home')); ?>">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p><?php echo e(__('Dashboard')); ?></p>
                </a>
            </li>
            <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" ><?php echo e(__('Laravel Examples')); ?></span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li <?php if($pageSlug == 'profile'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('profile.edit')); ?>">
                                <i class="tim-icons icon-single-02"></i>
                                <p><?php echo e(__('User Profile')); ?></p>
                            </a>
                        </li>
                        <li <?php if($pageSlug == 'users'): ?> class="active " <?php endif; ?>>
                            <a href="<?php echo e(route('users.index')); ?>">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p><?php echo e(__('User Management')); ?></p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            <li <?php if($pageSlug == 'icons'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('pages.icons')); ?>">
                    <i class="tim-icons icon-atom"></i>
                    <p><?php echo e(__('Icons')); ?></p>
                </a>
            </li>
            <li <?php if($pageSlug == 'maps'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('pages.maps')); ?>">
                    <i class="tim-icons icon-pin"></i>
                    <p><?php echo e(__('Maps')); ?></p>
                </a>
            </li>
            <li <?php if($pageSlug == 'notifications'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('pages.notifications')); ?>">
                    <i class="tim-icons icon-bell-55"></i>
                    <p><?php echo e(__('Notifications')); ?></p>
                </a>
            </li>
            <li <?php if($pageSlug == 'tables'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('pages.tables')); ?>">
                    <i class="tim-icons icon-puzzle-10"></i>
                    <p><?php echo e(__('Table List')); ?></p>
                </a>
            </li>
            <li <?php if($pageSlug == 'typography'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('pages.typography')); ?>">
                    <i class="tim-icons icon-align-center"></i>
                    <p><?php echo e(__('Typography')); ?></p>
                </a>
            </li>
            <li <?php if($pageSlug == 'rtl'): ?> class="active " <?php endif; ?>>
                <a href="<?php echo e(route('pages.rtl')); ?>">
                    <i class="tim-icons icon-world"></i>
                    <p><?php echo e(__('RTL Support')); ?></p>
                </a>
            </li>
            <li class=" <?php echo e($pageSlug == 'upgrade' ? 'active' : ''); ?> bg-info">
                <a href="<?php echo e(route('pages.upgrade')); ?>">
                    <i class="tim-icons icon-spaceship"></i>
                    <p><?php echo e(__('Upgrade to PRO')); ?></p>
                </a>
            </li>
        </ul>
    </div>
</div>
<?php /**PATH /var/www/html/elite/resources/views/layouts/navbars/sidebar.blade.php ENDPATH**/ ?>