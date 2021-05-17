<?php $__env->startSection('title'); ?>Offer | Autopati <?php $__env->stopSection(); ?> 
<?php $__env->startSection('content'); ?>

<div class="compare-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="compare-block">
                    <div class="row">
                        <div class="col-12">
                            <div style="display: flex; justify-content : space-between;">
                            <h5 class="mb-4" ><?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?> </h5>
                            <h5 class="mb-4" style="color: #e53012"><i class="fa fa-eye" style=""></i>  <?php echo e($car->views); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php 
                        if($car->car_image){
                            $imagePath = asset($car->file_full_path).'/'.$car->car_image;
                        }else{
                            $imagePath = asset('admin/vehicle.jpeg');
                        }
                     
                        ?>
            
                        <div class="col-md-6 d-flex" >
                            <div class="">
                                <img src="<?php echo e($imagePath); ?>" alt="" style="width: 100%">
                                <h2 class="text-center" style="color:#e53012 " >Rs. <?php echo e(number_to_words($car->starting_price)); ?> </h2>
                            </div>
                        </div>
                        <div class="col-md-6 mt-auto mb-auto">
                            <h1 style="color:#e53012 " >CURRENT OFFER !</h1>
                            <?php if($car->discount_percent != null): ?>
                            <div class="pricing-table-body">
                                <h4 style="color:#e53012 " >Discount Percentage</h4>
                                <h1 class="pricing-table-price text-success" ><span><?php echo e($car->discount_percent); ?></span>%</h1>
                                <ul class="list-unstyled content-group">
                                    <li><strong>Discount Amount : </strong> <span class="text-success">Rs. <?php echo e(number_to_words($car->discount_amount)); ?></span></li>
                                </ul>
                            </div>
                            <hr>
                            <?php endif; ?>
                            <?php if($car->flat_amount != null): ?>
                            <div class="pricing-table-body">
                                <h4 style="color:#e53012 " >Flat Discount</h4>
                                <h1 class="pricing-table-price text-success"><span>Rs. <?php echo e(number_to_words($car->flat_amount)); ?></span></h1>
                                
                            </div>
                            <?php endif; ?>
                            
                            <?php
                            $current_date = Carbon\Carbon::now()->format('Y-m-d');
                            ?>

                            <?php if($car->expected_launch_date >= $current_date): ?>
                            <h6 class="text-left" style="color: # e53012"><span style="color: gray">Expected Launch Date :</span> <?php echo e(date('d M Y ',strtotime($car->expected_launch_date))); ?></h6>
                            <?php endif; ?>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('home::layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Home/Resources/views/home/offer.blade.php ENDPATH**/ ?>