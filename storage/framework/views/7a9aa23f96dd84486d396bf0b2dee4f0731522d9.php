<?php $__env->startSection('content'); ?>
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: <?php echo config('servicecategory.name'); ?>

    </p>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('servicecategory::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/ServiceCategory/Resources/views/index.blade.php ENDPATH**/ ?>