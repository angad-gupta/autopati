    
<?php $__env->startSection('title'); ?> Car Profile <?php $__env->stopSection(); ?> 
<?php $__env->startSection('breadcrum'); ?> Car Profile <?php $__env->stopSection(); ?> 

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('admin/global/js/plugins/pickers/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/picker_date.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_multiselect.js')); ?>"></script>
<script src="<?php echo e(asset('admin/assets/js/plugins/forms/jquery-clock-timepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_inputs.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>

<style>
    .page-content {
        background-color: #FFFEFE !important;
    }
    .form-lead {
        padding-left: 4px !important;
    }
</style>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_select2.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/ui/fab.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/ui/sticky.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/ui/prism.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/extra_fab.js')); ?>"></script>
 <script src="<?php echo e(asset('admin/global/js/plugins/uploaders/fileinput/fileinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/uploader_bootstrap.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 


<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-left" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>

     <a href="<?php echo e(route('cars.index')); ?>" class="fab-menu-btn btn bg-danger btn-float rounded-round btn-icon"><i class="icon-arrow-left15" data-popup="tooltip" data-placement="bottom" data-original-title="Back To Car"></i></a>

 </li>
</ul>
<!-- /top right menu -->

<div class="card bg-light"> 
    <div class="card-body">
        <div class="row tab-content">

    <?php 
    if($car_info){
        $imagePath = asset($car_info->file_full_path).'/'.$car_info->car_image;
    }else{
        $imagePath = asset('admin/vehicle.jpeg');
    }
    ?>
    <div class="col-md-3">
        <div class="card-img-actions mx-1 mt-1 text-center">
            <figure style="height:170px; width:170px; margin: 20px auto 0; " class="text-center">
               <img class="img-fluid rounded-round" style="width: 170px; height: 170px; object-fit: cover; border: 1px solid #eeeeec" src="<?php echo e($imagePath); ?>" alt="">
           </figure>
       </div>

       <div class="card-body text-center" style="margin-top: -10px;margin-bottom: -10px;">
        <h6 class="font-weight-semibold mb-0"><?php echo e(optional($car_info->BrandInfo)->brand_name); ?> :: <?php echo e(optional($car_info->ModelInfo)->model_name); ?> </h6>
        <span class="d-block text-muted"><?php echo e(optional($car_info->VariantInfo)->variant_name); ?></span>

         <ul class="list-inline list-inline-condensed mt-1 mb-0" style="width: 294px;margin-left: 46px;">
            <li class="list-inline-item">
               <a class="btn bg-teal-400 btn-icon rounded-round" href="<?php echo e(route('cars.edit',$car_info->id)); ?>" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>
           </li>
           <li class="list-inline-item">
            <a data-toggle="modal" data-target="#modal_theme_warning" link="<?php echo e(route('cars.delete',$car_info->id)); ?>" class="btn bg-danger-400 rounded-round btn-icon delete_car" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-trash"></i></a>
        </li>
    </ul>

</div>


</div>

<div class="col-md-9">
    <div class="mb-3">

        <?php echo Form::model($car_info,['method'=>'PUT','route'=>['cars.update',$car_info->id],'class'=>'form-horizontal','id'=>'cars_submit','role'=>'form','files'=>true]); ?> 

        <h6 class="font-weight-semibold mt-2"><i class="text-teal icon-folder6 mr-2"></i><a href="#" class="text-teal">About This Car<i class="ml-2 text-primary icon-question3" data-popup="tooltip" data-placement="bottom" data-original-title="Please point Icon for more Details." style="margin-top: -18px;"></i></a>

         <button id="spinner-light-4"  type="submit" class="btn bg-success border-success text-success-800 btn-icon ml-2 enabled_editLead" style="float:right;display: none;" data-popup="tooltip" data-placement="top" data-original-title="Update"><i class="icon-pen-plus"></i></button>

         <button type="button" class="btn bg-warning border-warning text-warning-800 btn-icon ml-2 editContact" style="float:right;" data-popup="tooltip" data-placement="top" data-original-title="Edit"><i class="icon-pencil"></i></button>

         <div class="dropdown-divider mb-2"></div></h6>

          <?php echo Form::hidden('car_profile','true'); ?>


         <div class="row">
            <div class="col-md-3">
                <div class="form-group form-group-feedback" style="margin-bottom: 6px;">
                     <div class="input-group">
                        <?php echo Form::select('brand_id',$brand, $value = null, ['placeholder'=>'-- Select Brand --','id'=>'brand_id','class'=>'edit_select form-control select-search',' data-fouc','disabled']); ?>

                    </div>
                </div>
                <div class="form-group form-group-feedback" style="margin-bottom: 6px;">
                     <div class="input-group">
                        <?php echo Form::select('model_id',$model, $value = $car_info->model_id, ['id'=>'model_id','placeholder'=>'Select Model','class'=>'edit_select form-control select-search','disabled']); ?>

                    </div>
                </div>
                <div class="form-group form-group-feedback" style="margin-bottom: 6px;">
                     <div class="input-group">
                         <?php echo Form::select('variant_id',$variant, $value = $car_info->variant_id, ['id'=>'variant_id','placeholder'=>'Select Variant','class'=>'edit_select form-control select-search','disabled']); ?>


                    </div>
                </div>
        </div>

        <div class="col-md-3">
            <div class="form-group form-group-feedback" style="margin-bottom: 6px;">

                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-pencil6" data-popup="tooltip" data-placement="bottom" data-original-title="Year of Manufacture"></i>
                        </span>
                    </span>

                     <?php echo Form::text('year_of_manufacture', null, ['id'=>'year_of_manufacture','placeholder'=>'Enter Year of Manufacture','class'=>'year_of_manufacture form-control','readonly']); ?>


                </div>
            </div>

              <div class="form-group form-group-feedback" style="margin-bottom: 6px;">

                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-coins" data-popup="tooltip" data-placement="bottom" data-original-title="Starting Price"></i>
                        </span>
                    </span>

                    <?php echo Form::text('starting_price', null, ['id'=>'starting_price','placeholder'=>'Enter Starting Price','class'=>'edit_content form-control','readonly']); ?>


                </div>
            </div>

            <div class="form-group form-group-feedback" style="margin-bottom: 6px;">

                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots" data-popup="tooltip" data-placement="bottom" data-original-title="Is Popular Car ?"></i>
                        </span>
                    </span>

                     <?php echo Form::select('is_popular',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_popular','class'=>'edit_select form-control','disabled']); ?>


                </div>
            </div>
        </div>


        <div class="col-md-3">
         <div class="form-group form-group-feedback" style="margin-bottom: 6px;">

            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-dots" data-popup="tooltip" data-placement="bottom" data-original-title="Is Luxury Car ?"></i>
                    </span>
                </span>

               <?php echo Form::select('is_luxury',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_luxury','class'=>'edit_select form-control','disabled']); ?>


            </div>
        </div>

        <div class="form-group form-group-feedback " style="margin-bottom: 6px;">

            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-dots" data-popup="tooltip" data-placement="bottom" data-original-title="Is Deal of the Month ?"></i>
                    </span>
                </span>

               <?php echo Form::select('is_deal_of_the_month',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_deal_of_the_month','class'=>'edit_select form-control','disabled']); ?>


            </div>
        </div>

        <div class="form-group form-group-feedback" style="margin-bottom: 6px;">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-pencil6" data-popup="tooltip" data-placement="bottom" data-original-title="Short Quote"></i></span>
                </span>
                <?php echo Form::text('short_quote', null, ['placeholder'=>'Enter Short Quote','class'=>'edit_content form-control','readonly']); ?>

            </div>
        </div>
    </div>

  
<div class="col-md-3">

     <div class="form-group form-group-feedback" style="margin-bottom: 6px;">

        <div class="input-group">
            <span class="input-group-prepend">
                <span class="input-group-text"><i class="icon-dots" data-popup="tooltip" data-placement="bottom" data-original-title="Is Electric Car ?"></i>
                </span>
            </span>
           <?php echo Form::select('is_electric',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_electric','class'=>'edit_select form-control','disabled']); ?>

        </div>
    </div>



    <div class="form-group form-group-feedback" style="margin-bottom: 6px;">

        <div class="input-group">
            <span class="input-group-prepend">
                <span class="input-group-text"><i class="icon-dots" data-popup="tooltip" data-placement="bottom" data-original-title="Is Top Car ?"></i>
                </span>
            </span>

            <?php echo Form::select('is_top_car',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_top_car','class'=>'edit_select form-control','disabled']); ?>

        </div>
    </div>

</div>




</div>

<?php echo Form::close(); ?>



</div>
</div>

</div>
</div>
</div>



<div class="card">
    <div class="bg-pink card-header header-elements-inline">
        <h6 class="card-title"><i class="icon-car2 mr-2"></i>Car Details</h6>
    </div>

    <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-highlight ">
            <li class="nav-item"><a href="#bottom-justified-tab1" class="nav-link active" data-toggle="tab"><i class="icon-image2 mr-2"></i>Photo Features</a></li>
            <li class="nav-item"><a href="#bottom-justified-tab2" class="nav-link" data-toggle="tab"><i class="icon-gallery mr-2"></i>Specifications</a></li>
            <li class="nav-item"><a href="#bottom-justified-tab3" class="nav-link" data-toggle="tab"><i class="icon-images3 mr-2"></i>Photo Gallery</a></li>
            <li class="nav-item"><a href="#bottom-justified-tab4" class="nav-link" data-toggle="tab"><i class="icon-droplet2 mr-2"></i>Available Car Color</a></li>
    
        </ul>

        <div class="tab-content">
            <div class="tab-pane fade show active" id="bottom-justified-tab1">
                 
                <div style="float: right;margin-top: -5px;" class="card mb-4">
                       <a data-toggle="modal" data-target="#fullHeightModalFeatures" class="btn btn-teal btn-labeled btn-labeled-left btn-sm bg-teal" title="Create Task">
                        <b>
                            <i class="text-teal-400 icon-image2"></i>
                        </b>Create Photo Features
                    </a> 
                </div>
                <span class="mb-2 font-weight-bold text-teal">Did we missed out any Features ? Create Photo Features of Respective Vehicle.</span>
           
                <?php if(sizeof($photo_feature)>0): ?>
                <div class="row mt-3">
                     <?php $__currentLoopData = $photo_feature; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $feature_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        $featimage = ($feature_val->feature_image) ? asset($feature_val->file_full_path).'/'.$feature_val->feature_image : asset('admin/image.png');
                     ?>
                    <div class="col-lg-2 col-md-6">
                        <div class="card">
                            <div class="card-img-actions">
                                <img class="card-img-top img-fluid" src="<?php echo e($featimage); ?>" alt="">
                                <div class="card-img-actions-overlay card-img-top">

                                     <a data-toggle="modal" data-target="#modal_theme_warning" class="btn btn-outline btn-icon bg-white text-white border-white border-2 rounded-round delete_feature" link="<?php echo e(route('feature.delete',$feature_val->id)); ?>" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent d-flex justify-content-between">
                                <span class="text-dark"><?php echo e($feature_val->highlighted_feature); ?></span>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>

            </div>

            <div class="tab-pane fade" id="bottom-justified-tab2">

                <span class="mb-4 font-weight-bold text-pink">Most Important part in Vehicle, Specification. Please Set Value Accurately</span>

                <div class="card mt-3">
                            <div class="card-header bg-teal header-elements-inline">
                                <h6 class="card-title">Specifications</h6>
                            </div>

                            <div class="card-body">
                                <div class="d-md-flex">
                                    <ul class="nav nav-tabs nav-tabs-vertical flex-column mr-md-3 wmin-md-200 mb-md-0 border-bottom-0" style="min-width: 220px !important;">
                                        <?php if($car_spec->total() != 0): ?> 
                                        <?php $__currentLoopData = $car_spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <li class="nav-item"><a href="#vertical-left-tab<?php echo e($key+1); ?>" class="nav-link <?php if($key =='0'): ?> active show <?php endif; ?>" data-toggle="tab"><i class="icon-grid5 mr-2"></i> <?php echo e($spec_val->spec_title); ?></a></li>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </ul>

                                    <div class="tab-content" style="width: 100%">
                                        <?php $configuration = app('\App\Modules\Configuration\Repositories\ConfigurationRepository'); ?>
                                        <?php if($car_spec->total() != 0): ?> 
                                        <?php $__currentLoopData = $car_spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php
                                        $features = $configuration->findAllBySpecId($spec_val->id);
                                        ?>

                                        <div class="tab-pane fade <?php if($key =='0'): ?> active show <?php endif; ?>" id="vertical-left-tab<?php echo e($key+1); ?>">
                                        
                                            <div class="row">

                                                <?php if($features->total() != 0): ?> 
                                                <?php $carSpecification = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
                                                <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php
                                                $carFeatures = $carSpecification->getFeaturesByCarId($car_info->id,$spec_val->id,$spec_val->id);
                                                ?>
                                                <div class="col-lg-3">
                                                    <div class="card">
                                                        <div class="card-header bg-pink header-elements-inline">
                                                            <h6 class="card-title"><?php echo e($spec_val->title); ?></h6>
                                                        </div>

                                                        <div class="card-body">
                                                            <ul class="media-list mb-3">
                                                                 <?php if(sizeof($carFeatures) >0): ?> 
                                                                 <?php $__currentLoopData = $carFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $car_feat_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <li class="media">
                                                                    <div class="mr-3">
                                                                        <div class="uniform-checker" id="uniform-task1"><span class="checked"><input type="checkbox" class="form-check-input-styled-success" id="task1" disabled checked="" data-fouc=""></span></div>
                                                                    </div>

                                                                    <div class="media-body">
                                                                        <h6 class="media-title">
                                                                            <label for="task1" class="font-weight-semibold cursor-pointer mb-0"><?php echo e(optional($car_feat_val->confFeatureInfo)->config_value); ?></label>
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                <?php else: ?>
                                                                <li class="media">
                                                                    <div class="media-body">
                                                                        <h6 class="media-title">
                                                                            <label for="task1" class="font-weight-semibold cursor-pointer mb-0">No Configuration Set</label>
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                                <?php endif; ?>
                                                            </ul>

                                                            <div class="d-flex align-items-center" style="float: right;">

                                                                <a class="btn btn-warning btn-labeled btn-labeled-left btn-sm bg-warning add_car_features" spec_id="<?php echo e($spec_val->id); ?>" config_id="<?php echo e($spec_val->id); ?>" title="Add Features"><b><i class="icon-add-to-list"></i></b>Add Features</a> 
                                                            </div>

                                                        </div> 
                                                    </div> 
                                                </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php else: ?>
                                                <div c-lass="col-lg-3">
                                                    <div class="card">
                                                        <div class="card-header bg-pink header-elements-inline">
                                                            <h6 class="card-title">No Features Added</h6>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php endif; ?>
                                            </div>
                                           
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

            </div>

            <div class="tab-pane fade" id="bottom-justified-tab3">
               
                <div style="float: right;margin-top: -14px;" class="card mb-1">
                       <a data-toggle="modal" data-target="#fullHeightModalGallery" class="btn btn-purple-700 btn-labeled btn-labeled-left btn-sm bg-purple-700" title="Create Task">
                        <b>
                            <i class="text-purple-700-400 icon-image2"></i>
                        </b>Create Photo Gallery
                    </a> 
                </div>
                <span class="mb-3 font-weight-bold text-purple-700">High Quality Images brings Site more Beautiful.Did you Try Images with HD ?</span>

                
                <div class="card-group-control card-group-control-right mt-3 " id="accordion-control-right">

                    <?php if(sizeof($photo_gallery)>0): ?>
                    <div class="row"> 
                        <?php $__currentLoopData = $photo_gallery; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header bg-grey">
                                    <h6 class="card-title">
                                        <a data-toggle="collapse" class="text-default collapsed" href="#accordion-control-right-group<?php echo e($key+1); ?>" aria-expanded="false"><?php echo e($value->gallery_title); ?> #<?php echo e($key+1); ?></a>
                                    </h6>
                                </div>

                                <div id="accordion-control-right-group<?php echo e($key+1); ?>" class="collapse" data-parent="#accordion-control-right" style="">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Image Path</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(!$value->galleryDetail->isEmpty()): ?>
                                                        <?php $__currentLoopData = $value->galleryDetail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $gallery): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <?php
                                                            $file_icon = asset('admin/image.png');
                                                            $ipath = asset($gallery->file_full_path).'/'.$gallery->car_image_path;
                                                        ?>
                                                            <tr>
                                                                <td><a href="<?php echo e($ipath); ?>" target="_blank"><img src="<?php echo e($ipath); ?>" height="30px" width="30px"></a></td>
                                                                <td><a href="<?php echo e($ipath); ?>" target="_blank"><?php echo e($gallery->car_image_path); ?></a></td>
                                                                <td>
                                                                    <div class="list-icons">
                                                                        <a style="color:red" data-toggle="modal" data-target="#modal_theme_warning" link="<?php echo e(route('gallery.deleteImages',['gallery_image_id'=>$gallery->id])); ?>" class="list-icons-item text-danger-600 delete_gallery_image" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-trash"></i></a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                        <tr><td colspan='3'>No Gallery Images Added</td></tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="text-right mt-2">
                                             <a data-toggle="modal" data-target="#modal_gallery_add_images" gallery_name="<?php echo e($value->gallery_title); ?>" gallery_id= "<?php echo e($value->id); ?>" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left add_more_gallery" data-popup="tooltip" data-original-title="Add More" data-placement="bottom"><b><i class="icon-add-to-list "></i></b> Add More</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php endif; ?>
                </div>


            </div>

            
            <div class="tab-pane fade" id="bottom-justified-tab4">
               
                <div style="float: right;margin-top: -14px;" class="card mb-1">
                       <a data-toggle="modal" data-target="#fullHeightModalCarColor" class="btn btn-success-700 btn-labeled btn-labeled-left btn-sm bg-success-700" title="Create Task">
                        <b>
                            <i class="text-success-700-400 icon-car2"></i>
                        </b>Create Available Color Car
                    </a> 
                </div>
                <span class="mb-3 font-weight-bold text-success-700">Variety Color Of Car Attract More Customer. Do we have More color Car Available ?</span>

                <?php if(sizeof($car_color)>0): ?>
                <div class="row mt-3">
                     <?php $__currentLoopData = $car_color; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $color_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                     <?php
                        $colorimage = ($color_val->car_image) ? asset($color_val->file_full_path).'/'.$color_val->car_image : asset('admin/image.png');
                     ?>
                    <div class="col-lg-2 col-md-6">
                        <div class="card">
                            <div class="card-img-actions">
                                <img class="card-img-top img-fluid" src="<?php echo e($colorimage); ?>" alt="">
                                <div class="card-img-actions-overlay card-img-top">

                                    <a data-toggle="modal" data-target="#modal_color_car_update" class="mr-2 btn btn-outline btn-icon bg-white text-white border-white border-2 rounded-round update_car_image" car_color_id ="<?php echo e($color_val->id); ?>" data-popup="tooltip" data-original-title="Update Car Image" data-placement="bottom"><i class="icon-pencil7"></i></a>

                                     <a data-toggle="modal" data-target="#modal_theme_warning" class="btn btn-outline btn-icon bg-white text-white border-white border-2 rounded-round delete_feature" link="<?php echo e(route('feature.deleteColorCar',$color_val->id)); ?>" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                                </div>
                            </div>

                            <div class="card-footer bg-transparent d-flex justify-content-between">
                                <span class="text-dark"><?php echo e($color_val->color_title); ?></span>
                                <a href="#" class="btn rounded-round btn-icon btn-sm" style="margin-top: -8px;margin-bottom: -5px;background-color:<?php echo e($color_val->color_code); ?>">
                                    <span class="letter-icon"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>


            </div>

        </div>
    </div>
</div>




<!-- Full Height Modal Right -->
<div class="modal modal_slide right" id="modal_color_car_update" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" data-direction='right'>
    <div class="modal-dialog modal-full-height modal-right" role="document">

        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><i class="icon-image2 mr-2"></i>Upload Car Images</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" style="height: 371px;overflow-y: scroll;">

                <?php echo Form::open(['route'=>'feature.updateColorCar','method'=>'POST','id'=>'features_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?> 

                <?php echo e(Form::hidden('car_id',  $car_info->id)); ?>

                <?php echo Form::hidden('car_color_id','', array('id' => 'car_color_id')); ?>


                    <fieldset class="mb-1">
                        <div class="form-group">
                           <?php echo Form::file('car_image', ['id'=>'car_image','class'=>'form-control']); ?>

                        </div>

                        <div class="form-group">
                            <img id="car_image" src="<?php echo e(asset('admin/car.png')); ?>" alt="your image" class="preview-image" style="height: 60px; width: auto;" />
                        </div>
                    </fieldset>

                <div class="text-right">
                     <button type="button" data-dismiss="modal"  class="close-btn ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-cross2"></i></b>Close</button>
                      <button type="submit" id="spinner-light-4" onclick="submitForm(this);" class="ml-2 btn bg-success-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Update </button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->

<!-- Full Height Modal Right -->
<script src="<?php echo e(asset('admin/validation/feature.js')); ?>"></script>
<div class="modal modal_slide right" id="fullHeightModalFeatures" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" data-direction='right'>
    <div class="modal-dialog modal-full-height modal-right" role="document">

        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><i class="icon-image2 mr-2"></i>Photo Features</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" style="height: 371px;overflow-y: scroll;">

                <?php echo Form::open(['route'=>'feature.storePhotoFeature','method'=>'POST','id'=>'features_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?> 

                <?php echo e(Form::hidden('car_id',  $car_info->id)); ?>


                    <fieldset class="mb-1">
                        <div class="form-group">
                            <div class="input-group">
                               <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-list-numbered"></i></span>
                                </span>
                            <?php echo Form::text('highlighted_feature', $value = null, ['id'=>'highlighted_feature','placeholder'=>'Enter Photo Features','class'=>'form-control','required']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                           <?php echo Form::file('feature_image', ['id'=>'feature_image','class'=>'form-control']); ?>

                           <span class="text-success-800">We Recommend Feature Images must be 330 X 250 pixels.</span> 
                        </div>

                        <div class="form-group">
                            <img id="feature_image" src="<?php echo e(asset('admin/car.png')); ?>" alt="your image" class="preview-image" style="height: 60px; width: auto;" />
                        </div>
                    </fieldset>

                <div class="text-right">
                     <button type="button" data-dismiss="modal"  class="close-btn ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-cross2"></i></b>Close</button>
                      <button type="submit" id="spinner-light-4" onclick="submitForm(this);" class="ml-2 btn bg-success-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Save Feature </button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->

<!-- Full Height Modal Right -->
<script src="<?php echo e(asset('admin/validation/carcolor.js')); ?>"></script>
<div class="modal modal_slide right" id="fullHeightModalCarColor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" data-direction='right'>
    <div class="modal-dialog modal-full-height modal-right" role="document">

        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><i class="icon-image2 mr-2"></i>Available Car</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" style="height: 371px;overflow-y: scroll;">

                <?php echo Form::open(['route'=>'feature.storeColorCar','method'=>'POST','id'=>'color_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?> 

                <?php echo e(Form::hidden('car_id',  $car_info->id)); ?>


                    <fieldset class="mb-1">
                        <div class="form-group">
                            <div class="input-group">
                               <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-droplet2"></i></span>
                                </span>
                            <?php echo Form::text('color_title', $value = null, ['id'=>'color_title','placeholder'=>'Enter Color Name','class'=>'form-control','required']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="input-group">
                               <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-select2"></i></span>
                                </span>
                            <?php echo Form::text('color_code', $value = null, ['id'=>'color_code','placeholder'=>'Enter Color Code(in HEXA) ','class'=>'form-control','required']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                           <?php echo Form::file('car_image', ['id'=>'car_image','class'=>'form-control']); ?>

                        </div>

                        <div class="form-group">
                            <img id="car_image" src="<?php echo e(asset('admin/car.png')); ?>" alt="your image" class="preview-image" style="height: 60px; width: auto;" />
                        </div>
                    </fieldset>

                <div class="text-right">
                     <button type="button" data-dismiss="modal"  class="close-btn ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-cross2"></i></b>Close</button>
                      <button type="submit" id="spinner-light-4" onclick="submitForm(this);" class="ml-2 btn bg-success-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Store </button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->


<!-- Full Height Modal Right -->
<script src="<?php echo e(asset('admin/validation/gallery.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/uploaders/fileinput/fileinput.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/uploader_bootstrap.js')); ?>"></script>
<div class="modal modal_slide right" id="fullHeightModalGallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true" data-direction='right'>
    <div class="modal-dialog modal-full-height modal-right" role="document">

        <div class="modal-content">
            <div class="modal-header bg-slate">
                <h6 class="modal-title"><i class="icon-image2 mr-2"></i>Photo Features</h6>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body" style="height: 371px;overflow-y: scroll;">

                <?php echo Form::open(['route'=>'feature.storePhotoGallery','method'=>'POST','id'=>'gallery_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?> 

                <?php echo e(Form::hidden('car_id',  $car_info->id)); ?>


                    <fieldset class="mb-1">
                        <div class="form-group">
                            <div class="input-group">
                               <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-list-numbered"></i></span>
                                </span>
                            <?php echo Form::text('gallery_title', $value = null, ['id'=>'gallery_title','placeholder'=>'Enter Gallery Title','class'=>'form-control','required']); ?>

                            </div>
                        </div>

                        <div class="form-group">
                          <input type="file" name="car_images[]" class="file-input" multiple="multiple" data-fouc>
                           <span class="text-success-800">We Recommend Feature Images must be 450 X 250 pixels For Better.</span> 
                        </div>
                    </fieldset>

                <div class="text-right">
                     <button type="button" data-dismiss="modal"  class="close-btn ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-cross2"></i></b>Close</button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>
<!-- Full Height Modal Right -->
<!--End of Side Popup For Task -->



 <!-- Warning modal -->
    <div id="modal_gallery_add_images" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-pink-400">
                    <h5 class="modal-title gallery-title">Additional Gallery Images</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">

                <?php echo Form::open(['route'=>'feature.storePhotoGalleryImages','method'=>'POST','id'=>'vehiclemodel_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?>

            
               <?php echo e(Form::hidden('car_id',  $car_info->id)); ?>

               <?php echo Form::hidden('gallery_id','', array('id' => 'add_gallery_id')); ?>


                <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
                    <fieldset class="mb-1">
                        <legend class="text-uppercase font-size-sm text-danger font-weight-black"></legend>


                        <div class="row">
                            <label class="col-form-label col-lg-2">Gallery Images:</label>
                            <div class="col-lg-10 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                   <input type="file" name="car_images[]" class="file-input" multiple="multiple" data-fouc>
                                   
                                </div>
                                <span class="text-success-800">We Recommend Feature Images must be 450 X 250 pixels For Better.</span> 
                            </div>
                        </div>
                                
                    </fieldset>
                </div>

                <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->

 <!-- Warning modal -->
    <div id="fullHeightCarFeatures" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-full">
            <div class="modal-content">
                <div class="modal-header bg-pink-400">
                    <h5 class="modal-title gallery-title">Set Car Features</h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">

                <?php echo Form::open(['route'=>'feature.storeCarFeatures','name'=>'features_form','method'=>'POST','id'=>'vehiclemodel_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?>

            
               <?php echo e(Form::hidden('car_id',  $car_info->id)); ?>

               <?php echo Form::hidden('spec_id','', array('id' => 'car_spec_id')); ?>

               <?php echo Form::hidden('confid_id','', array('id' => 'car_config_id')); ?>


                <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
                    <fieldset class="mb-1">
                        <legend class="text-uppercase font-size-sm text-danger font-weight-black"></legend>


                        <div class="row">
                                <div class="col-md-12">
                                    <h5>Select Select To Send Mail</h5>
                                    <div class="card card-body">

                                        <div class="panel-footer">
                                            <a href="javascript:void(0)" onclick="selectAllCheckBoxes('features_form', 'config_feature_id[]', true);" class="btn bg-success-400"><i class="icon-checkmark-circle2"></i> Select All</a>

                                            <a href="javascript:void(0)" onclick="selectAllCheckBoxes('features_form', 'config_feature_id[]', false);" class="btn bg-danger-400"><i class="icon-eraser2"></i> Clear All </a>

                                        </div>
                                        <hr>

                                        <div class="table-responsive listed_features">

                                        </div>
                                        <!-- table-responsive -->
                                    </div>
                                    <!-- col-md-6 -->
                                </div>
                                
                            </div>
                                
                    </fieldset>

                    <div class="text-right">
                        <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-paperplane"></i></b> Add Features</button>
                    </div>
                </div>

                <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



 <!-- Warning modal -->
    <div id="modal_theme_warning" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-danger icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h2>Are You Sure Want To Delete ?</h2>
                        <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->

<script type="text/javascript">

    $('document').ready(function() {

    $('.add_car_features').on('click',function(){
            var spec_id = $(this).attr('spec_id'); 
            var confid_id = $(this).attr('config_id'); 

            $('#car_spec_id').val(spec_id);
            $('#car_config_id').val(confid_id);

            var token = $("input[name='_token']").val();
          
              $.ajax({
                  url: "<?php echo route('append-feature-ajax') ?>",
                  method: 'POST',
                  data: {confid_id:confid_id, _token:token},
                  success: function(data) {
                    $('#fullHeightCarFeatures').modal('show');
                     $(".listed_features").html('');
                     $(".listed_features").html(data.options);
                  }
              });
        });

        
        $('.add_more_gallery').on('click', function() {
            var gallery_id = $(this).attr('gallery_id'); 
            var gallery_name = $(this).attr('gallery_name'); 
           
           $('#add_gallery_id').val(gallery_id);
           $('.gallery-title').html('Gallery Images on Gallery Title <b>'+gallery_name+'</b>');
        });

         $('.delete_feature').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });       

         $('.delete_car').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });       

   
        $('.update_car_image').on('click', function() {
            var car_color_id = $(this).attr('car_color_id');
            $('#car_color_id').val(car_color_id);
        });

         $('.delete_gallery_image').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('#brand_id').on('change',function(){
            var brand_id = $(this).val();
            var token = $("input[name='_token']").val();
          
              $.ajax({
                  url: "<?php echo route('append-model-ajax') ?>",
                  method: 'POST',
                  data: {brand_id:brand_id, _token:token},
                  success: function(data) {
                     $("select[name='model_id'").html('');
                     $("select[name='model_id'").html(data.options);
                  }
              });
        });

        $('#model_id').on('change',function(){
            var model_id = $(this).val();
            var token = $("input[name='_token']").val();
          
              $.ajax({
                  url: "<?php echo route('append-variant-ajax') ?>",
                  method: 'POST',
                  data: {model_id:model_id, _token:token},
                  success: function(data) {
                     $("select[name='variant_id'").html('');
                     $("select[name='variant_id'").html(data.options);
                  }
              });
        });

        $(document).on('click', '.editContact', function () {

            $('.edit_content').attr('readonly', false); 
            $('.edit_select').attr('disabled', false); 
            $('.multiselect').attr('disabled', false); 
            $('.multiselect').removeClass('disabled'); 
            $('.edit_content').removeClass('text-grey'); 
            $('.edit_content').addClass('text-dark'); 
            $('.editContact').hide();
            $('.enabled_editLead').show();

        });
    });


function selectAllCheckBoxes(FormName, FieldName, CheckValue) { 
    if (!document.forms[FormName])
        return;
    var objCheckBoxes = document.forms[FormName].elements[FieldName];
    if (!objCheckBoxes)
        return;
    var countCheckBoxes = objCheckBoxes.length;
    if (!countCheckBoxes)
        objCheckBoxes.checked = CheckValue;
    else
// set the check value for all check boxes
for (var i = 0; i < countCheckBoxes; i++)
    objCheckBoxes[i].checked = CheckValue;
}


</script>

<style>
    .activity {
        position: relative;
        padding-left: 2rem;
        margin-left: 1rem;
    }
    .activity::before {
        content: "";
        width: 2px;
        background-color: #d6d6d6;
        height: calc(100% - 40px);
        position: absolute;
        left: 0;
        top: 20px;
    }

    .activity-item {
        background-color: #f9f9f9;
        border-top: 0;
        border-bottom: 0;
        border-right: 0;
        position: relative;
        box-shadow: 0 1px 3px 0 #ccc;
    }

    .activity-item::before {
        content: "";
        width: 18px;
        height: 18px;
        border-radius: 50%;
        background-color: #24a9ee;
        position: absolute;
        left: -43px;
        top: 12px;
    }

    .circle-28 {
        width: 28px;
        height: 28px;
    }

    .circle-28 span {
        display: block;
        line-height: 1.4;
    }


    .modal_slide{
        display: flex !important;
        width: 500px !important;
        left: unset;
        right: -500px;
        transition: 0.5s ease-in-out right;
    }
    .modal_slide .modal-full-height { 
        display: flex;
        margin: 0;
        width: 100%;
        height: 100%;
    }
    .modal_slide.show{
        right: 0;
        transition: 0.5s ease-in-out right;
    }
    .modal_slide .modal-dialog .modal-content{
        border-radius: 0;
        border: 0;
    }

</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Cars\Resources/views/cars/profile.blade.php ENDPATH**/ ?>