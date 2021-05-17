<?php $__env->startSection('title'); ?>Services | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

<section class="ecm-features home-tabs ecm-new pt-3 pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Available</span> Services</h1>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <?php $__currentLoopData = $service_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <a class="nav-link <?php if($loop->first): ?>active <?php endif; ?>" id="pills-one-tab" data-toggle="pill" href="#service-<?php echo e($service_category->id); ?>" role="tab" aria-controls="pills-one" aria-selected="true"><?php echo e($service_category->title); ?></a>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <?php $__currentLoopData = $service_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="tab-pane fade show <?php if($loop->first): ?>active <?php endif; ?>" id="service-<?php echo e($service_category->id); ?>" role="tabpanel" aria-labelledby="pills-one-tab">
                        <div class="">
                            <?php $services = app('\App\Modules\ServiceManagement\Repositories\ServiceManagementRepository'); ?>
                            <?php
                                $services = $services->findAllActiveServiceCategory($limit=50,$service_category->id);
                            ?>
                             <div class="row">
                            <?php $__empty_1 = true; $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                           
                            <div class="col-md-3">
                                <div class="services_item">
                                    <a href="<?php echo e(route('service',$service->id)); ?>"><img src="<?php echo e(($service->cover_image) ? asset($service->file_full_path).'/'.$service->cover_image : asset('admin/default.png' )); ?>" alt=""></a>
                                    <div class="services_item_desc">
                                        <h6><a href="<?php echo e(route('service',$service->id)); ?>"><?php echo e($service->title); ?></a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; <?php echo e($service->location); ?></span>
                                        
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="container" style="margin: 20px 20px;">
                                <h1 class="text-center">No Service Available ! </h1>
                            </div>
                            <?php endif; ?>
                             </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Home\Resources/views/home/list-services.blade.php ENDPATH**/ ?>