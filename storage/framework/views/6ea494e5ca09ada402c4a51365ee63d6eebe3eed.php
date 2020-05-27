<?php $__env->startSection('content'); ?>
    <div class="header py-7 py-lg-8">
        <div class="container">
            <div class="header-body text-center mb-7">
                <div class="row justify-content-center">
                    <div class="col-lg-5 col-md-6">
                        <h1 class="text-white"><?php echo e(__('Welcome!')); ?></h1>
                        <p class="text-lead text-light">
                            <?php echo e(__('Use Black Dashboard theme to create a great project.')); ?>

                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/elite/resources/views/welcome.blade.php ENDPATH**/ ?>