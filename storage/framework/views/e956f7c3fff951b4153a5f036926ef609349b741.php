<?php if($errors->has($field)): ?>
    <span class="invalid-feedback" role="alert"><?php echo e($errors->first($field)); ?></span>
<?php endif; ?>
<?php /**PATH /var/www/html/elite/resources/views/alerts/feedback.blade.php ENDPATH**/ ?>