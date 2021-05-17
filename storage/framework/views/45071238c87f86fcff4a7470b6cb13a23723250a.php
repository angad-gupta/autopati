<?php $__env->startSection('title'); ?><?php echo e($page_content->title); ?> | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>



<section class="ecm-features ecm-new pb-0">
    <?php 
        if($page_content->image){
            $imagePath = asset($page_content->file_full_path).'/'.$page_content->image;
        }else{
            $imagePath = asset('admin/vehicle.jpeg');
        }
    ?>
    <div class="page-banner">
        <img src="<?php echo e($imagePath); ?>" alt="">
    </div>
    <div class="compare-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="ecm-features__title d-flex align-items-center justify-content-between">
                        <h1><span><?php echo $page_content->short_content; ?> </span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <p><?php echo $page_content->description; ?></p>
                </div>
            </div>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/page.blade.php ENDPATH**/ ?>