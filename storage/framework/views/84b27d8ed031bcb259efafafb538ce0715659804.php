<?php $__env->startSection('title'); ?>Brands | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

<section class="ecm-features ecm-new pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span><?php echo e($type); ?></span> brands</h1>
                  
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            
            <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-2">
                <a href="<?php echo e(route('list.brand.vehicles',$brand->id)); ?>" class="brand-item">
                    <img src="<?php echo e(($brand->brand_logo) ? asset($brand->file_full_path).'/'.$brand->brand_logo : asset('admin/default.png')); ?>" alt="<?php echo e($brand->brand_name); ?>">
                    <h5><?php echo e($brand->brand_name); ?></h5>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/list-brand.blade.php ENDPATH**/ ?>