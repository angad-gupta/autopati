<?php $__env->startSection('title'); ?>News | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>



<section class="ecm-features ecm-new pb-0">
    <?php 
        if($news->news_image){
            $imagePath = asset($news->file_full_path).'/'.$news->news_image;
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
                        <h1><span><?php echo e($news->title); ?> </span></h1>
                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <p><?php echo $news->sub_content; ?></p>
                    <p><?php echo $news->content; ?></p>
                  
                </div>
            </div>
        </div>
    </div>

</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Home\Resources/views/home/news.blade.php ENDPATH**/ ?>