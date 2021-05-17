<?php $__env->startSection('title'); ?>
<?php if(isset($first_vehicle)): ?>
    <?php echo e(optional($first_vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($first_vehicle->ModelInfo)->model_name); ?> <?php echo e(optional($first_vehicle->VariantInfo)->variant_name); ?> 
<?php else: ?>
   -
<?php endif; ?>
vs 
<?php if(isset($second_vehicle)): ?>
    <?php echo e(optional($second_vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($second_vehicle->ModelInfo)->model_name); ?> <?php echo e(optional($second_vehicle->VariantInfo)->variant_name); ?></h5>
<?php else: ?>
    -
<?php endif; ?>
| Compare Detail| Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('breadcrumb'); ?> Compare Detail <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

<?php
    $empty_vehicle = '- Not Vehicle Found -';
    $empty_description = '- No Description Found -';
    $empty_feature = '- No Feature Found -';
    $empty_photo = '- No Photo Found -';
?>

<div class="compare-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="compare-block">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-4">
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
                        </div>
                    </div>
                    <div class="row">
                    
                        <?php if(isset($first_vehicle)): ?>
                        <div class="col-md-3 d-flex offset-3">
                            <div class="compare_vehicles">
                                <img src="<?php echo e($first_vehicle->car_image ? asset($first_vehicle->file_full_path).'/'.$first_vehicle->car_image : asset('admin/vehicle.jpeg')); ?>" alt="">

                                <div class="services_item_desc">
                                    <h6><a href="<?php echo e(route('car.detail',$first_vehicle->id)); ?>"><?php echo e(optional($first_vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($first_vehicle->ModelInfo)->model_name); ?> <?php echo e(optional($first_vehicle->VariantInfo)->variant_name); ?></a></h6>
                                    <h6>Rs. <?php echo e(number_to_words($first_vehicle->starting_price)); ?></h6>
                                    <span>Avg. Ex-Showroom price</span>
                                    <?php if($first_vehicle->is_offer_available == 1): ?>
                                        <a href="<?php echo e(route('car.offer',$first_vehicle->id)); ?>" class="btn btn-primary btn-sm" target="_blank">Get Offers</a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <?php echo e($empty_vehicle); ?>

                        <?php endif; ?>
                        
                        <?php if(isset($second_vehicle)): ?>
                        <div class="col-md-3 d-flex">
                            <div class="compare_vehicles">
                                <img src="<?php echo e($second_vehicle->car_image ? asset($second_vehicle->file_full_path).'/'.$second_vehicle->car_image : asset('admin/vehicle.jpeg')); ?>" alt="">
                                <div class="services_item_desc">
                                    <h6><a href="<?php echo e(route('car.detail',$second_vehicle->id)); ?>"><?php echo e(optional($second_vehicle->BrandInfo)->brand_name); ?> <?php echo e(optional($second_vehicle->ModelInfo)->model_name); ?> <?php echo e(optional($second_vehicle->VariantInfo)->variant_name); ?></a></h6>
                                    <h6>Rs. <?php echo e(number_to_words($second_vehicle->starting_price)); ?></h6>
                                    <span>Avg. Ex-Showroom price</span>
                                    <?php if($second_vehicle->is_offer_available == 1): ?>
                                    <a href="<?php echo e(route('car.offer',$second_vehicle->id)); ?>" class="btn btn-primary btn-sm" target="_blank">Get Offers</a>
                                <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php else: ?>
                            <?php echo e($empty_vehicle); ?>

                        <?php endif; ?>
         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="compare-wrap">
    <div class="container">
        <div class="row">
                <h3>Compare for 
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
                </h3>
                <div class="col-md-6">
                    <p>
                        <?php if(isset($second_vehicle)): ?>
                        <?php echo $first_vehicle->description; ?>

                        <?php else: ?>
                        <?php echo e($empty_description); ?>

                        <?php endif; ?>
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        <?php if(isset($second_vehicle)): ?>
                        <?php echo $second_vehicle->description; ?>

                        <?php else: ?>
                        <?php echo e($empty_description); ?>

                        <?php endif; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>

 
<div class="compare-info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <h4 class="mb-4"><span>Technical Specification :</span> 
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

                <div class="page-accordian">
                   
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      
                        <?php $configuration = app('\App\Modules\Configuration\Repositories\ConfigurationRepository'); ?>
                        <?php $__currentLoopData = $vehicle_spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                            // dd($spec_val->configValues);
                            $features = $configuration->findAllBySpecId($spec_val->id);
                            $config_count = $configuration->countBySpecId($spec_val->id);
                            // dd($spec_val->configValues);
                            ?>
                            <?php if($config_count): ?>
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#spec-<?php echo e($spec_val->id); ?>" aria-expanded="false" aria-controls="collapseTwo">
                                            <?php echo e($spec_val->spec_title); ?>

                                        </a>
                                    </h4>
                                </div>
                                <div id="spec-<?php echo e($spec_val->id); ?>" class="panel-collapse collapse <?php if($loop->first): ?>collapse show <?php endif; ?> role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                               
                                                <?php $carSpecification = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
                                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                             
                                                <tr>
                                                    <th scope="row" style="font-size:1rem;"><?php echo e($spec_val->title); ?></th>
                                                    <td style="font-size:1rem;font-size: 1rem;font-weight: 400;line-height: 1.5;">
                                                        <?php if(isset($first_vehicle)): ?>
                                                            <?php
                                                                $first_vehicle_features = $carSpecification->getFeaturesByCarId($first_vehicle->id,$spec_val->id,$spec_val->id);
                                                            ?>
                                                             <?php if(count($first_vehicle_features) > 0 ): ?>
                                                            <?php $__currentLoopData = $first_vehicle_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $first_vehicle_feature_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           
                                                                <?php echo e(optional($first_vehicle_feature_val->confFeatureInfo)->config_value); ?> 
                                                              
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                                <p> - </p>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php echo e($empty_feature); ?>

                                                        <?php endif; ?>
                                                    </td>
                                                    <td style="font-size:1rem;font-size: 1rem;font-weight: 400;line-height: 1.5;">
                                                        <?php if(isset($second_vehicle)): ?>
                                                            <?php
                                                                $second_vehicle_features = $carSpecification->getFeaturesByCarId($second_vehicle->id,$spec_val->id,$spec_val->id);
                                                            ?>
                                                            <?php if(count($second_vehicle_features) > 0 ): ?>
                                                                <?php $__currentLoopData = $second_vehicle_features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $second_vehicle_feature_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <?php echo e(optional($second_vehicle_feature_val->confFeatureInfo)->config_value); ?> 
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <?php else: ?>
                                                            <p> - </p>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <?php echo e($empty_feature); ?>

                                                        <?php endif; ?>
                                                        
                                                    </td>
                                                </tr>
                                             
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                   
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>





<div class="compare-image">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Photo Comparison</h4>
            </div>

            <?php if(isset($first_vehicle)): ?>
            <div class="col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php $__currentLoopData = $first_vehicle_photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keynav => $valuenav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="nav-link <?php if($loop->first): ?> active <?php endif; ?>" id="v-pills-home-tab" data-toggle="pill" href="#firsttab-<?php echo e($keynav+1); ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo e($valuenav->gallery_title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="tab-content" id="v-pills-tabContent">
                        <?php $__currentLoopData = $first_vehicle_photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key1 => $value1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                            <div class="tab-pane fade <?php if($loop->first): ?>show active <?php endif; ?>" id="firsttab-<?php echo e($key1 + 1); ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            <?php if(!$value1->galleryDetail->isEmpty()): ?>
                                            <?php $__currentLoopData = $value1->galleryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keyone => $galleryone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                                <?php
                                                    $ipath1 = asset($galleryone->file_full_path).'/'.$galleryone->car_image_path;
                                                ?>

                                            <div class="col-md-12">
                                                <div class="compare-image__item">
                                                    <a href="<?php echo e($ipath1); ?>" target="_blank"><img src="<?php echo e($ipath1); ?>"></a>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p>No Gallery Images Added</p>>
                                            <?php endif; ?>
                                        </div>
                                </div>
                      
                                </div>
                            </div>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
 
             </div>

             <?php else: ?>
             <div class="col-md-6">
                <?php echo e($empty_photo); ?>

             </div>
            <?php endif; ?>


            <?php if(isset($second_vehicle)): ?>
             <div class="col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <?php $__currentLoopData = $second_vehicle_photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keynav => $valuenav): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a class="nav-link <?php if($loop->first): ?> active <?php endif; ?>" id="v-pills-home-tab" data-toggle="pill" href="#secondtab-<?php echo e($keynav+1); ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo e($valuenav->gallery_title); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="tab-content" id="v-pills-tabContent">
                        <?php $__currentLoopData = $second_vehicle_photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key2 => $value2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          
                            <div class="tab-pane fade <?php if($loop->first): ?>show active <?php endif; ?>" id="secondtab-<?php echo e($key2 + 1); ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            <?php if(!$value2->galleryDetail->isEmpty()): ?>
                                            <?php $__currentLoopData = $value2->galleryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $keytwo => $gallerytwo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            
                                                <?php
                                                    $ipath2 = asset($gallerytwo->file_full_path).'/'.$gallerytwo->car_image_path;
                                                ?>

                                            <div class="col-md-12">
                                                <div class="compare-image__item">
                                                    <a href="<?php echo e($ipath2); ?>" target="_blank"><img src="<?php echo e($ipath2); ?>"></a>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            <?php else: ?>
                                                <p>No Gallery Images Added</p>>
                                            <?php endif; ?>
                                        </div>
                                </div>
                                </div>
                            </div>
                          
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
 
             </div>
             <?php else: ?>
             <div class="col-md-6">
                <?php echo e($empty_photo); ?>

             </div>
            <?php endif; ?>

        </div>
    </div>
</div>






<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/compare-detail.blade.php ENDPATH**/ ?>