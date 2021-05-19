<?php $__env->startSection('title'); ?><?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?> | Detail | Autopati <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?><?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>

    <?php echo $__env->make('home::home.partial.breadcrumb', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    
    <div class="section-padding">
        <div class="container">
            <div class="product-full">
                <?php
                if($car->car_image){
                    $imagePath = asset($car->file_full_path).'/'.$car->car_image;
                }else{
                    $imagePath = asset('admin/vehicle.jpeg');
                }
                ?>

                <figure class="product-media">
                    <img src="<?php echo e($imagePath); ?>" alt="">
                </figure>

                <div class="product-excerpt">
                    <div class="product-views">
                        <i class="fa fa-eye" style=""></i>  <?php echo e($car->views); ?>
                    </div>

                    <h1 class="product-title" >
                        <?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?>
                    </h1>

                    <div class="product-quote">
                        <?php echo e($car->short_quote); ?>
                    </div>

                    <div class="product-launch-date">
                        <?php
                        $current_date = Carbon\Carbon::now()->format('Y-m-d');
                        ?>

                        <?php if($car->expected_launch_date >= $current_date): ?>
                        <span>Expected Launch Date :</span> <?php echo e(date('d M Y ',strtotime($car->expected_launch_date))); ?>
                        <?php endif; ?>
                    </div>

                    <div class="product-content">
                        <?php echo e($car->short_content); ?>
                    </div>

                    <div class="product-price" >
                        Rs. <?php echo e(number_to_words($car->starting_price)); ?>
                    </div>

                    <?php if($car->is_offer_available == 1): ?>
                    <div class="product-action-bar">
                        <h4 class="text-center"><a href="<?php echo e(route('car.offer',$car->id)); ?>" class="btn btn-primary btn-sm ">Get Offers</a></h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    
    <div class="section-padding">
        <div class="container">
            <div class="viewer">
                <div class="viewer-control">
                    <div class="block-title">
                        <h3>
                            Choose you vehicle colors
                        </h3>
                    </div>

                    <div class="swatch swatch_color-picker">
                        <div class="swatch-option color">
                            <input type="radio" id="colorName1" name="Address" checked>

                            <label for="colorName1" data-toggle="tooltip" data-placement="top" title="Red" style="background: red">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName2" name="Address">

                            <label for="colorName2" data-toggle="tooltip" data-placement="top" title="Yellow" style="background: yellow">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName3" name="Address">

                            <label for="colorName3" data-toggle="tooltip" data-placement="top" title="White" style="background: white">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName4" name="Address">

                            <label for="colorName4" data-toggle="tooltip" data-placement="top" title="Pink" style="background: pink">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName5" name="Address">

                            <label for="colorName5" data-toggle="tooltip" data-placement="top" title="Black" style="background: black">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName6" name="Address">

                            <label for="colorName6" data-toggle="tooltip" data-placement="top" title="Purple" style="background: purple">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="viewer-display">
                    <figure>
                        <img src="/home/img/2.png" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    
    <div class="section-padding">
        <div class="container">
            <div class="product-view">
                <div class="product-view--display">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="owl-carousel owl-theme nav-inside carousel_product-view">
                                
                                <div class="item">
                                    <img src="/home/img/f1.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f2.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f3.jpg" alt="Car name">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="owl-carousel owl-theme nav-inside carousel_product-view">
                                
                                <div class="item">
                                    <img src="/home/img/f1.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f2.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f3.jpg" alt="Car name">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="owl-carousel owl-theme nav-inside carousel_product-view">
                                
                                <div class="item">
                                    <img src="/home/img/f1.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f2.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f3.jpg" alt="Car name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-view--control">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                Front
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                Side
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                Rear
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        
        <div class="section-padding">
            <div class="container">
                <div class="product-description">
                    <div class="product-information">
                        <div class="block-title">
                            <h3>
                                <?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?>
                            </h3>
                        </div>

                        <p><?php echo $car->description; ?>

                        </p>
                    </div>

                    <div></div>
                </div>
            </div>
        </div>

        
        <div class="section-padding">
            <div class="container">
                <div class="block-product-specification">
                    <div class="block-title">
                        <h3>
                            <span>Technical Specification :</span>
                            <!-- Product name redundant -->
                        <?php /*echo e(optional($car->BrandInfo)->brand_name); */?><!-- <?php /*echo e(optional($car->ModelInfo)->model_name); */?> --><?php /*echo e(optional($car->VariantInfo)->variant_name); */?>
                        </h3>
                    </div>

                    <div class="page-accordian">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php $configuration = app('\App\Modules\Configuration\Repositories\ConfigurationRepository'); ?>
                            <?php $__currentLoopData = $car_spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                            $features = $configuration->findAllBySpecId($spec_val->id);
                            $config_count = $configuration->countBySpecId($spec_val->id);
                            ?>

                            <?php if($config_count): ?>
                            <div class="column">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <?php if($features->isNotEmpty()): ?>
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#spec-<?php echo e($spec_val->id); ?>" aria-expanded="false" aria-controls="collapseTwo">
                                                <?php echo e($spec_val->spec_title); ?>

                                            </a>
                                            <?php endif; ?>
                                        </h4>
                                    </div>
                                    <div id="spec-<?php echo e($spec_val->id); ?>" class="panel-collapse collapse <?php if($loop->first): ?>collapse show <?php endif; ?> role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                            <?php $carSpecification = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
                                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $carFeatures = $carSpecification->getFeaturesByCarId($car->id,$spec_val->id,$spec_val->id);
                                            ?>

                                            <tr>
                                                <th scope="row"><?php echo e($spec_val->title); ?></th>
                                                <td>
                                                    <?php if($carFeatures->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $carFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $car_feat_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(optional($car_feat_val->confFeatureInfo)->config_value); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    -
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
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

    <?php if(sizeof($photo_feature)>0): ?>
        <div class="container mt-4">
            <h4>Featured Image</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme new-arrival">
                        <?php $__currentLoopData = $photo_feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php
                                $featimage = ($feature_val->feature_image) ? asset($feature_val->file_full_path).'/'.$feature_val->feature_image : asset('admin/image.png');
                                $ipath = asset($feature_val->file_full_path).'/'.$feature_val->feature_image;
                            ?>

                            <div class="item">
                                <div class="card-img-actions">
                                    <a href="<?php echo e($ipath); ?>" target="_blank"><img class="card-img-top img-fluid" src="<?php echo e($featimage); ?>" alt=""></a>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(sizeof($photo_gallery)>0): ?>
        <div class="compare-image">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="mb-4">Photo</h4>
                    </div>

                    <div class="col-md-3">

                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <?php $__currentLoopData = $photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="nav-link <?php if($loop->first): ?> active <?php endif; ?>" id="v-pills-home-tab" data-toggle="pill" href="#v<?php echo e($value->id); ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo e($value->gallery_title); ?></a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                    <div class="col-md-8">

                        <div class="tab-content" id="v-pills-tabContent">
                            <?php $__currentLoopData = $photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade show <?php if($loop->first): ?> active <?php endif; ?>" id="v<?php echo e($value->id); ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                    <div class="row">
                                        <?php if(!$value->galleryDetail->isEmpty()): ?>
                                            <?php $__currentLoopData = $value->galleryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                    $file_icon = asset('admin/image.png');
                                                    $ipath = asset($gallery->file_full_path).'/'.$gallery->car_image_path;
                                                ?>

                                                <div class="col-md-6">
                                                    <div class="compare-image__item">
                                                        <a href="<?php echo e($ipath); ?>" target="_blank"><img src="<?php echo e($ipath); ?>"></a>
                                                        
                                                        
                                                    </div>
                                                </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <p>No Gallery Images Added</p>>
                                        <?php endif; ?>

                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

    

    
    <?php $similarcars = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
    <?php
        $brand_id = optional($car->BrandInfo)->id;
        $model_id = optional($car->ModelInfo)->id;
        $variant_id = optional($car->VariantInfo)->id;
        $similar_cars = $similarcars->findSimilarCar($limit=12,$brand_id,$model_id,$variant_id,$car->id);

    ?>
    <?php if($similar_cars->isNotEmpty()): ?>
        <section class="ecm-features home-tabs ecm-new bg-grey pt-4 pb-4">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span>Similar</span> Cars</h1>
                            <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">

                        <div class="owl-carousel owl-theme new-arrival">
                            <?php $__currentLoopData = $similar_cars; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $similar_car): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php
                                    if($similar_car->car_image){
                                        $imagePath = asset($similar_car->file_full_path).'/'.$similar_car->car_image;
                                    }else{
                                        $imagePath = asset('admin/vehicle.jpeg');
                                    }
                                ?>

                                <div class="item">
                                    <a href="<?php echo e(route('car.detail',$similar_car->id)); ?>" class="services_item_desc" style="color: black;">
                                        <img src="<?php echo e($imagePath); ?>" alt="" height="200">
                                        <span><?php echo e(optional($similar_car->BrandInfo)->brand_name); ?> </span>
                                        <h6><?php echo e(optional($similar_car->ModelInfo)->model_name); ?> <?php echo e(optional($similar_car->VariantInfo)->variant_name); ?> </h6>

                                        <h5>Rs. <?php echo e(number_to_words($similar_car->starting_price)); ?></h5>
                                    </a>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Home\Resources/views/home/detail.blade.php ENDPATH**/ ?>