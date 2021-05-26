<?php $__env->startSection('title'); ?>Home | Autopati <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php if(count($header_banners) > 0): ?>
        <section class="ecm-banner">
            <div class="owl-carousel owl-theme banner-slider nav-inside pagination-inside">
                <?php $__currentLoopData = $header_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $header_banner): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="item">
                        <div class="banner-block" style="background-image: url('<?php echo e(($header_banner->banner_image) ? asset($header_banner->file_full_path).'/'.$header_banner->banner_image : asset('admin/vehicle.jpeg' )); ?>');">
                            <div class="container">
                                <div class="row justify-content-end">
                                    <div class="col-md-4">
                                        <div class="card banner-search">
                                            <div class="card-body banner-search-title">
                                                <h6 style="color: #e53012">Find your Perfect Car</h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="mb-3">
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="budget" checked>
                                                        <label class="form-check-label" for="budget" style="font-weight:600;">By Budget</label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <input class="form-check-input" type="radio" name="inlineRadioOptions" id="model">
                                                        <label class="form-check-label" for="model" style="font-weight:600;">By Model</label>
                                                    </div>
                                                </div>
                                                <div class="form-group budget-class">
                                                    <form action="<?php echo e(route('search.budget')); ?>" method="GET">
                                                        <?php echo csrf_field(); ?>
                                                        <select class="form-control" name="budget" required>
                                                            <option>Select Budget From</option>
                                                            <option value="100000 500000">1 Lakh - 10 Lakh</option>
                                                            <option value="1000000 2000000" selected>10 Lakh to 20 Lakh</option>
                                                            <option value="2000000 3000000">20 Lakh to 30 Lakh</option>
                                                            <option value="3000000 4000000">30 Lakh to 40 Lakh</option>
                                                            <option value="4000000 5000000">40 Lakh to 50 Lakh</option>
                                                            <option value="5000000 6000000">50 Lakh to 60 Lakh</option>
                                                            <option value="6000000 7000000">60 Lakh to 70 Lakh</option>
                                                            <option value="7000000 8000000">70 Lakh to 80 Lakh</option>
                                                            <option value="8000000 9000000">80 Lakh to 90 Lakh</option>
                                                            <option value="9000000 10000000">90 Lakh to 1 Crore</option>
                                                            <option value="10000000 20000000">1 Crore to 2 Crore</option>
                                                            <option value="20000000 50000000">2 Crore to 5 Crore</option>
                                                        </select>

                                                        <button type="submit" class="btn btn-primary w-100 mt-3">Search</button>
                                                    </form>

                                                </div>

                                                <div class="form-group model-class" style="display: none">
                                                    <?php $vehicle_model = app('\App\Modules\VehicleModel\Repositories\VehicleModelRepository'); ?>
                                                    <?php
                                                        $vehicle_models = $vehicle_model->findAll($limit=50);
                                                    ?>

                                                    <form action="<?php echo e(route('search.model')); ?>" method="GET">
                                                        <select class="form-control" name="model" required>
                                                            <option>Select Model</option>
                                                            <?php $__currentLoopData = $vehicle_models; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vehicle_model): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option value="<?php echo e($vehicle_model->id); ?>"><?php echo e($vehicle_model->model_name); ?> </option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                        </select>
                                                        <button type="submit" class="btn btn-primary w-100 mt-3">Search</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

    <?php if(count($deal_of_the_months) > 0): ?>
        
    <?php endif; ?>

    <section class="section-compare section-padding">
        <div class="container">
            <div class="owl-carousel owl-theme carousel-compare-product">
                <form action="<?php echo e(route('compare.vehicles')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="compare">
                        <div class="compare_block__wrap">
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                            <?php if($key == 0): ?>
                            <div class="compare_block">
                                <?php 
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>

                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>

                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>
                            <input name="first_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="first_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="first_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                            <span class="tertiary">vs</span>
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php if($key == 1): ?>
                            <div class="compare_block">
                                <?php
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>
                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>
                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>

                            <input name="second_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="second_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="second_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="compare_action_bar">
                            <button type="submit" class="btn btn-primary btn-block">Compare Cars</button>
                        </div>
                    </div>
                </form>

                <form action="<?php echo e(route('compare.vehicles')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="compare">
                        <div class="compare_block__wrap">
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                            <?php if($key == 2): ?>
                            <div class="compare_block">
                                <?php 
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>

                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>

                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>
                            <input name="first_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="first_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="first_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                            <span class="tertiary">vs</span>
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php if($key == 3): ?>
                            <div class="compare_block">
                                <?php
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>
                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>
                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>

                            <input name="second_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="second_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="second_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="compare_action_bar">
                            <button type="submit" class="btn btn-primary btn-block">Compare Cars</button>
                        </div>
                    </div>
                </form>

                <form action="<?php echo e(route('compare.vehicles')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="compare">
                        <div class="compare_block__wrap">
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                            <?php if($key == 4): ?>
                            <div class="compare_block">
                                <?php 
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>

                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>

                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>
                            <input name="first_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="first_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="first_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                            <span class="tertiary">vs</span>
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php if($key == 5): ?>
                            <div class="compare_block">
                                <?php
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>
                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>
                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>

                            <input name="second_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="second_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="second_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="compare_action_bar">
                            <button type="submit" class="btn btn-primary btn-block">Compare Cars</button>
                        </div>
                    </div>
                </form>

                <form action="<?php echo e(route('compare.vehicles')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="compare">
                        <div class="compare_block__wrap">
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    
                            <?php if($key == 0): ?>
                            <div class="compare_block">
                                <?php 
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>

                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>

                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>
                            <input name="first_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="first_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="first_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                            <span class="tertiary">vs</span>
                            <?php $__currentLoopData = $cars_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                            <?php if($key == 1): ?>
                            <div class="compare_block">
                                <?php
                                if($value){
                                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                                ?>
                                <figure class="compare_media">
                                    <img src="<?php echo e($imagePath); ?>" alt="">
                                </figure>

                                <div class="compare-excerpt">
                                    <div class="compare_brand">
                                        <?php echo e(optional($value->BrandInfo)->brand_name); ?> 
                                    </div>
                                    <div class="compare_title">
                                        <?php echo e(optional($value->ModelInfo)->model_name); ?> <?php echo e(optional($value->VariantInfo)->variant_name); ?>

                                    </div>

                                    <div class="compare_price">
                                        Rs. <?php echo e($value->starting_price); ?>

                                    </div>
                                </div>
                            </div>

                            <input name="second_brand_id" value="<?php echo e($value->brand_id); ?>" hidden />
                            <input name="second_model_id" value="<?php echo e($value->model_id); ?>" hidden />
                            <input name="second_variant_id" value="<?php echo e($value->variant_id); ?>" hidden />
                            <?php endif; ?>
                        
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="compare_action_bar">
                            <button type="submit" class="btn btn-primary btn-block">Compare Cars</button>
                        </div>
                    </div>
                </form>
                

 
                
            </div>
        </div>
    </section>

    <?php if(count($car_brands) > 0): ?>
        <section class="ecm-features ecm-new">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span>Four Wheeler</span> brands</h1>
                            <a href="<?php echo e(route('list.car-brand')); ?>" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="owl-carousel owl-theme brand discount-slider">
                    <?php $__currentLoopData = $car_brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $car_brand): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <a href="<?php echo e(route('list.brand.vehicles',$car_brand->id)); ?>" class="brand-item">
                                <img src="<?php echo e(($car_brand->brand_logo) ? asset($car_brand->file_full_path).'/'.$car_brand->brand_logo : asset('admin/vehicle.jpeg')); ?>" alt="<?php echo e($car_brand->brand_name); ?>">
                                <h5><?php echo e($car_brand->brand_name); ?></h5>
                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    

    <?php if(count($service_categories) > 0): ?>
        <section class="ecm-features home-tabs ecm-new">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span>Services</span> </h1>
                            <a href="<?php echo e(route('service.all')); ?>" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <ul class="nav nav-pills mb-3 nav-horizontal" id="pills-tab" role="tablist">
                            <?php $__currentLoopData = $service_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($loop->first): ?>active <?php endif; ?>" id="pills-one-tab" data-toggle="pill" href="#service-<?php echo e($service_category->id); ?>" role="tab" aria-controls="pills-one" aria-selected="true"><?php echo e($service_category->title); ?></a>
                                </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>

                        <div class="tab-content" id="pills-tabContent">
                            <?php $__currentLoopData = $service_categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service_category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade show <?php if($loop->first): ?>active <?php endif; ?>" id="service-<?php echo e($service_category->id); ?>" role="tabpanel" aria-labelledby="pills-one-tab">
                                    <div class="owl-carousel owl-theme new-featured nav-inside">
                                        <?php $services = app('\App\Modules\ServiceManagement\Repositories\ServiceManagementRepository'); ?>
                                        <?php
                                            $services = $services->findAllActiveServiceCategory($limit=12,$service_category->id);
                                        ?>
                                        <?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="item">
                                                <div class="services_item">
                                                    <a href="<?php echo e(route('service',$service->id)); ?>"><img src="<?php echo e(($service->cover_image) ? asset($service->file_full_path).'/'.$service->cover_image : asset('admin/vehicle.jpeg' )); ?>" alt=""></a>
                                                    <div class="services_item_desc">
                                                        <h6><a href="<?php echo e(route('service',$service->id)); ?>"><?php echo e($service->title); ?></a></h6>
                                                        <span><i class="fa fa-map-marker text-info"></i> &nbsp; <?php echo e($service->location); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(count($most_searched) > 0): ?>
        <section class="ecm-features home-tabs ecm-new">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span>Most Searched</span> Cars </h1>
                            <a href="<?php echo e(route('list.most-searched-car')); ?>" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="owl-carousel owl-theme new-featured nav-inside">
                    <?php $__currentLoopData = $most_searched; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $most_search): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="item">
                            <div class="services_item">
                                <a href="<?php echo e(route('car.detail',$most_search->id)); ?>"><img src="<?php echo e(($most_search->car_image) ? asset($most_search->file_full_path).'/'.$most_search->car_image : asset('admin/vehicle.jpeg')); ?>" alt=""></a>
                                <div class="services_item_desc">
                                    <h6><a href="<?php echo e(route('car.detail',$most_search->id)); ?>"><?php echo e(optional($most_search->BrandInfo)->brand_name); ?> <?php echo e(optional($most_search->ModelInfo)->model_name); ?></a></h6>
                                    <p class="mb-0">Starting Rs. <?php echo e(number_to_words($most_search->starting_price)); ?></p>
                                    <div class="d-flex justify-content-end">
                                        <a href="<?php echo e(route('car.detail',$most_search->id)); ?>" class="btn btn-outline-warning">View Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(count($luxuary_cars) > 0): ?>
        <section>
            
            

            <div class="owl-carousel owl-theme luxury-block nav-inside stock-clearance">
                <?php $__currentLoopData = $luxury_banners; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $luxury_banners): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="slider" style="background-image: url('<?php echo e(($luxury_banners->banner_image) ? asset($luxury_banners->file_full_path).'/'.$luxury_banners->banner_image : asset('admin/vehicle.jpeg' )); ?>">
                        <div class="slider-content">
                            <h4>Checkout Luxury car</h4>

                            <p><?php echo e($luxury_banners->short_content); ?></p>

                            <div class="action-bar">
                                <a href="<?php echo e(route('list.luxury-car')); ?>" class="btn btn-light">
                                    View All
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </section>
    <?php endif; ?>

    <section class="ecm-features">
        <div class="container">
            <div class="row">
                <?php $__currentLoopData = $luxuary_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $luxury): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-3 mb-4">
                        <a href="<?php echo e(route('car.detail',$luxury->id)); ?>" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        <img src="<?php echo e(($luxury->car_image) ? asset($luxury->file_full_path).'/'.$luxury->car_image : asset('admin/vehicle.jpeg' )); ?>" alt="<?php echo e($luxury->ModelInfo->model_name); ?> <?php echo e($luxury->VariantInfo->variant_name); ?>">
                    </span>
                            <h5><?php echo e($luxury->BrandInfo->brand_name); ?></h5>
                        </a>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </section>

    
    <section class="ecm-features">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-sm-12">
                    <div class="ecm-features__title d-flex align-items-center justify-content-between">
                        <h1><span>Upcoming</span> New Cars</h1>
                        <a href="<?php echo e(route('list.upcoming-car')); ?>" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme trending-products">
                        <?php $upcoming_car = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
                        <?php
                            $current_date = Carbon\Carbon::now()->format('Y-m-d');
                            $upcoming_cars = $upcoming_car->findUpcomingCar($limit=12, $current_date);
                        ?>

                        <?php $__currentLoopData = $upcoming_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $up_car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="item">
                                <a href="<?php echo e(route('car.detail',$up_car->id)); ?>" class="ecm-luxury__item">
                            <span class="ecm-luxury__img">
                                <img src="<?php echo e(($up_car->car_image) ? asset($up_car->file_full_path).'/'.$up_car->car_image : asset('admin/vehicle.jpeg' )); ?>" alt="">
                            </span>
                                    <h5><?php echo e(optional($up_car->BrandInfo)->brand_name); ?> <?php echo e(optional($up_car->ModelInfo)->model_name); ?> </h5>
                                </a>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <section class="ap-features">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex align-items-center">
                        <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 47 47"><path d="M21.035 12.52l-6.2-10.332C14.388 1.377 13.31.75 12.41.75H2.437C1.27.75.552 2.098 1.18 3.086L11.242 17.37c2.606-2.515 6.02-4.223 9.793-4.851zM45.473.75H35.5c-.988 0-1.887.54-2.426 1.438L26.875 12.52c3.773.628 7.188 2.335 9.793 4.851L46.731 3.086c.628-.988-.09-2.336-1.258-2.336zM24 15.125c-8.805 0-15.813 7.098-15.813 15.813 0 8.804 7.008 15.812 15.813 15.812 8.715 0 15.813-7.008 15.813-15.813 0-8.714-7.098-15.812-15.813-15.812zm8.266 14.195l-3.414 3.325.808 4.671c.18.809-.719 1.438-1.527 1.078L24 36.148l-4.223 2.246c-.808.36-1.707-.269-1.527-1.078l.809-4.672-3.415-3.324c-.628-.629-.269-1.617.54-1.797l4.761-.628 2.067-4.313c.18-.36.539-.539.898-.539.45 0 .809.18.988.539l2.067 4.313 4.762.628c.808.18 1.168 1.168.539 1.797z" fill="#ccc"/></svg>
                        <div class="ap-features_item">
                            <h5>Nepal’s #1</h5>
                            <span>Largest Auto Portal</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex align-items-center">
                        <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59 47"><path d="M47 17.91c.898.18 1.887.18 2.785 0l.809 1.348c.27.449.808.629 1.347.449.989-.36 1.977-.988 2.875-1.617.36-.36.54-.988.27-1.438l-.809-1.258c.63-.718 1.168-1.617 1.438-2.515h1.527c.54 0 .989-.36 1.078-.899.18-1.168.18-2.246 0-3.324-.09-.539-.539-.988-1.078-.988h-1.527c-.27-.898-.809-1.707-1.438-2.426l.809-1.258c.27-.539.09-1.078-.27-1.437-.898-.719-1.886-1.258-2.875-1.707-.539-.18-1.078 0-1.347.539l-.809 1.258a7.262 7.262 0 00-2.785 0l-.809-1.258c-.27-.54-.808-.719-1.347-.54-.989.45-1.977.99-2.875 1.708-.36.36-.54.898-.27 1.437l.809 1.258c-.63.719-1.168 1.528-1.438 2.426h-1.527c-.54 0-.988.45-1.078.988a10.322 10.322 0 000 3.324c.09.54.539.899 1.078.899h1.527c.27.898.809 1.797 1.438 2.516l-.809 1.257c-.27.45-.09 1.078.27 1.438.898.629 1.886 1.258 2.875 1.617.539.18 1.078 0 1.347-.45L47 17.91zm-.988-5.21c-2.606-3.505 1.258-7.458 4.761-4.762 2.696 3.414-1.257 7.367-4.761 4.761zM35.68 26.534c.36-1.887.36-3.863 0-5.75l3.054-1.527c.899-.54 1.258-1.617.899-2.606-.809-2.156-2.336-4.133-3.864-5.93-.628-.808-1.796-.988-2.695-.449l-2.605 1.528a15.178 15.178 0 00-4.942-2.875V5.96c0-1.078-.718-1.977-1.797-2.156a21.757 21.757 0 00-6.828 0c-.988.18-1.707 1.078-1.707 2.156v2.965c-1.886.629-3.504 1.617-4.941 2.875l-2.606-1.528c-.988-.539-2.066-.27-2.785.45-1.437 1.796-2.965 3.773-3.773 5.93-.36.988 0 2.066.988 2.605l2.965 1.527a15.468 15.468 0 000 5.75l-2.965 1.438c-.988.539-1.348 1.707-.988 2.605.808 2.246 2.336 4.223 3.773 5.93a2.207 2.207 0 002.785.449l2.606-1.438c1.437 1.169 3.055 2.157 4.941 2.786v3.054c0 1.078.72 1.977 1.797 2.157 2.246.359 4.582.359 6.738 0 1.079-.18 1.797-1.078 1.797-2.157v-3.054c1.797-.63 3.504-1.617 4.942-2.785l2.605 1.527c.899.45 2.067.27 2.696-.54 1.527-1.706 3.054-3.683 3.863-5.929.36-.988 0-2.066-.899-2.605l-3.054-1.438zm-10.602 1.887c-6.918 5.3-14.824-2.606-9.433-9.524 6.918-5.3 14.734 2.606 9.433 9.524zM47 44.773c.898.18 1.887.18 2.785 0l.809 1.348c.27.45.808.629 1.347.45.989-.36 1.977-.989 2.875-1.708.36-.27.54-.898.27-1.347l-.809-1.348c.63-.719 1.168-1.527 1.438-2.426h1.527c.54 0 .989-.36 1.078-.898.18-1.168.18-2.246 0-3.325-.09-.538-.539-.988-1.078-.988h-1.527c-.27-.898-.809-1.707-1.438-2.425l.809-1.258c.27-.54.09-1.078-.27-1.438-.898-.719-1.886-1.258-2.875-1.707-.539-.18-1.078 0-1.347.54l-.809 1.257a7.262 7.262 0 00-2.785 0l-.809-1.258c-.27-.539-.808-.719-1.347-.539-.989.45-1.977.988-2.875 1.707-.36.36-.54.899-.27 1.438l.809 1.258c-.63.718-1.168 1.527-1.438 2.425h-1.527c-.54 0-.988.45-1.078.989a10.323 10.323 0 000 3.324c.09.539.539.898 1.078.898h1.527c.27.899.809 1.707 1.438 2.426l-.809 1.348c-.27.449-.09 1.078.27 1.347.898.719 1.886 1.348 2.875 1.707.539.18 1.078 0 1.347-.449L47 44.773zm-.988-5.3c-2.606-3.414 1.258-7.367 4.761-4.672 2.696 3.414-1.257 7.367-4.761 4.672z" fill="#ccc"/></svg>
                        <div class="ap-features_item">
                            <h5>Top Listed</h5>
                            <span>Repair Services</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex align-items-center">
                        <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 47"><path d="M9.344 20.875H2.156C.898 20.875 0 21.863 0 23.031v21.563c0 1.258.898 2.156 2.156 2.156h7.188c1.168 0 2.156-.898 2.156-2.156V23.03c0-1.168-.988-2.156-2.156-2.156zM5.75 43.156c-1.258 0-2.156-.898-2.156-2.156 0-1.168.898-2.156 2.156-2.156 1.168 0 2.156.988 2.156 2.156 0 1.258-.988 2.156-2.156 2.156zM34.5 8.117C34.5 1.47 30.187.75 28.031.75c-1.886 0-2.695 3.594-3.054 5.21-.54 1.978-.989 3.954-2.336 5.302-2.875 2.965-4.403 6.648-7.996 10.152-.18.27-.27.54-.27.809v19.226c0 .54.45.989.988 1.078 1.438 0 3.325.809 4.762 1.438C23 45.223 26.504 46.75 30.816 46.75h.27c3.863 0 8.445 0 10.242-2.605.809-1.079.988-2.426.54-4.043 1.526-1.528 2.245-4.403 1.526-6.739 1.528-2.066 1.708-5.031.81-7.097C45.28 25.188 46 23.48 45.91 21.863c0-2.785-2.336-5.3-5.3-5.3h-9.165c.72-2.516 3.055-4.672 3.055-8.446z" fill="#ccc"/></svg>
                        <div class="ap-features_item">
                            <h5>Easy Search</h5>
                            <span>All Vehicles</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex align-items-center">
                        <svg width="46" fill="none" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 46 47"><path d="M45.371 40.55l-8.984-8.984c-.45-.359-.989-.628-1.528-.628h-1.437c2.426-3.145 3.953-7.098 3.953-11.5C37.375 9.194 28.93.75 18.687.75 8.355.75 0 9.195 0 19.438 0 29.77 8.355 38.124 18.688 38.124c4.312 0 8.265-1.438 11.5-3.953v1.527c0 .54.18 1.078.628 1.528l8.895 8.894c.898.898 2.246.898 3.055 0l2.515-2.516c.899-.808.899-2.156.09-3.054zm-26.684-8.175A12.884 12.884 0 015.75 19.437C5.75 12.34 11.5 6.5 18.688 6.5c7.097 0 12.937 5.84 12.937 12.938 0 7.187-5.84 12.937-12.938 12.937zm2.426-13.656L17.07 17.46c-.539-.09-.808-.54-.808-1.078 0-.719.449-1.258 1.078-1.258h2.515c.36 0 .81.18 1.168.36.27.18.63.18.899-.09l.988-.989a.674.674 0 000-1.078c-.808-.629-1.797-.988-2.785-.988v-1.527c0-.36-.36-.72-.719-.72H17.97c-.45 0-.719.36-.719.72v1.527c-2.156 0-3.863 1.797-3.863 4.043a4.076 4.076 0 002.785 3.863l4.043 1.258c.539.09.808.539.808 1.078 0 .719-.449 1.168-1.078 1.168H17.43c-.36 0-.809-.09-1.168-.27a.691.691 0 00-.899.09l-.988.989a.674.674 0 000 1.078 4.642 4.642 0 002.875.988v1.438c0 .449.27.718.719.718h1.437c.36 0 .719-.27.719-.718v-1.438c2.066 0 3.773-1.797 3.773-4.043 0-1.797-1.168-3.414-2.785-3.863z" fill="#ccc"/></svg>
                        <div class="ap-features_item">
                            <h5>Offers</h5>
                            <span>Stay Updated</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
    <?php if(count($news) > 0): ?>
        <section class="ecm-features">
            <div class="container">
                <div class="row justify-content-center mb-5">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span>Latest</span> News/Blogs</h1>
                            <a href="<?php echo e(route('news.all')); ?>" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php $__currentLoopData = $news; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $new): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script>
        $(document).ready(function(){
            $("input[id='budget']").change(function(){
                $('.budget-class').show();
                $('.model-class').hide();

            });

            $("input[id='model']").change(function(){
                $('.budget-class').hide();
                $('.model-class').show();
            });
        });
    </script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/index.blade.php ENDPATH**/ ?>