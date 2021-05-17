<?php $__env->startSection('title'); ?>News | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

<section class="ecm-features pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Latest</span> News/Blogs</h1>
                   
                </div>
            </div>
        </div>
        <div class="row">
            <?php $__empty_1 = true; $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-md-3">
                <a href="<?php echo e(route('news',$new->id)); ?>" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <?php 
                        if($new->news_image){
                            $imagePath = asset($new->file_full_path).'/'.$new->news_image;
                        }else{
                            $imagePath = asset('admin/vehicle.jpeg');
                        }
                    ?>
                        <img src="<?php echo e($imagePath); ?>" alt="">
                    </span>
                    <div class="ecm-luxury__desc">
                        <span><i class="fa fa-calendar"></i> &nbsp;<?php echo e($new->date); ?></span>
                        <h5><?php echo e($new->title); ?></h5>
                        <p><?php echo \Illuminate\Support\Str::limit($new->content,40); ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="container" style="margin: 20px 20px;">
                    <h1 class="text-center">No News/Blog Available ! </h1>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/list-news.blade.php ENDPATH**/ ?>