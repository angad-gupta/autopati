 <?php $__env->startSection('title'); ?>Notification <?php $__env->stopSection(); ?> <?php $__env->startSection('breadcrum'); ?>Notification <?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body">
        <fieldset>
            <legend class="text-uppercase font-size-sm font-weight-bold">Your Notification</legend>

            <div class="list-feed-rhombus">
                <?php if($notification->total() >0): ?> 
                <?php $__currentLoopData = $notification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $notice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php $icon = ($notice->is_read =='0') ? "icon-bell3" :"icon-bell-check"; $icon_color = ($notice->is_read =='0') ? "text-danger" :"text-success"; ?>
                <div class="list-feed-item d-flex flex-nowrap">

                    <span class="mr-3">
                        <a href="<?php echo e(route('Notification.checkLink',['notification_id'=>$notice->id])); ?>"><i class="<?php echo e($icon); ?> <?php echo e($icon_color); ?> mr-1"></i><span class="text-dark"><?php echo e($notice->message); ?></span></a>
                    <div class="text-muted"><?php echo e($notice->created_at->diffForHumans()); ?></div>
                    </span>

                    <div class="ml-auto">
                        <div class="list-icons">
                            <a href="<?php echo e($notice->link); ?>" class="list-icons-item ml-1"><i class="icon-circle-right2"></i></a>
                        </div>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?> 
                <span>
                No Notification
                </span>
                <?php endif; ?>

            </div>

        </fieldset>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Notification/Providers/../Resources/views/index.blade.php ENDPATH**/ ?>