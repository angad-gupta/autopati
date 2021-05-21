<?php $__env->startSection('title'); ?><?php echo e($service->title); ?> | Service | Autopati <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <section class="ecm-features page-title ecm-new p-0">
        <?php
            if($service->cover_image){
                $imagePath = asset($service->file_full_path).'/'.$service->cover_image;
            }else{
                $imagePath = asset('admin/vehicle.jpeg');
            }
        ?>

        <div class="page-banner">
            <img src="<?php echo e($imagePath); ?>" alt="">
        </div>

        <div class="compare-wrap section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span><?php echo e($service->title); ?> </span></h1>
                            <h6><span><i class="fa fa-map-marker"></i> <?php echo e($service->location); ?> </span></h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-3">
                        <p><?php echo $service->description; ?></p>
                    </div>
                </div>
            </div>
        </div>

    </section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/service.blade.php ENDPATH**/ ?>