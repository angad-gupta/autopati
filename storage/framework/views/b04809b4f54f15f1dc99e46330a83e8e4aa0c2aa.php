<?php $__env->startSection('title'); ?>New | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

<?php
    $empty_vehicle = '-';
?>
<?php if(isset($first_vehicle)): ?>
<?php echo e(optional($first_vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($first_vehicle->ModelInfo)->model_name); ?> <?php echo e(optional($first_vehicle->VariantInfo)->variant_name); ?> 
<?php else: ?>
<?php echo e($empty_vehicle); ?>

<?php endif; ?>

vs 
<?php if(isset($second_vehicle)): ?>
<?php echo e(optional($second_vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($second_vehicle->ModelInfo)->model_name); ?> <?php echo e(optional($second_vehicle->VariantInfo)->variant_name); ?></h5>
<?php else: ?>
<?php echo e($empty_vehicle); ?>

<?php endif; ?>









<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/new.blade.php ENDPATH**/ ?>