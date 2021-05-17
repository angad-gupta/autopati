<?php $__env->startSection('title'); ?> Brand - Model <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?> Brand - Model <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('admin/validation/dynamicblock.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_tags_input.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/bootstrap_multiselect.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_multiselect.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/global/js/plugins/forms/tags/tokenfield.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 



<?php echo $__env->make('vehiclemodel::vehiclemodel.partial.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


<div class="card card-body">
    <div class="media align-items-center align-items-md-start flex-column flex-md-row">
        <a href="#" class="text-teal mr-md-3 align-self-md-center mb-3 mb-md-0">
            <i class="icon-gallery text-success-400 border-success-400 border-3 rounded-round p-2"></i>
        </a>

        <div class="media-body text-center text-md-left">
            <h6 class="media-title font-weight-semibold">List of Model</h6>
            All the Brands Model with its Variants will listed below. You can Modify and Add New Variants too.
        </div>
        
        <a href="<?php echo e(route('vehiclemodel.create')); ?>" class="btn bg-success-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-add-to-list"></i></b> Create Model</a>
    </div>
</div>

<div class="card-group-control card-group-control-right" id="accordion-control-right">

<div class="row"> 
     <?php if($model_info->total() != 0): ?> 
        <?php $__currentLoopData = $model_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="col-lg-3">
            <div class="card" style="margin-bottom: 10px;">
                <div class="card-header bg-grey" style="padding-top: 10px;padding-bottom: 10px;">
                    <h6 class="card-title">
                        <a data-toggle="collapse" class="text-default collapsed" href="#accordion-control-right-<?php echo e($key+1); ?>" aria-expanded="false">#<?php echo e($key+1); ?>  <b><?php echo e(optional($value->BrandInfo)->brand_name); ?></b> :: <b><?php echo e($value->model_name); ?></b></a>
                    </h6>
                </div>

                <div id="accordion-control-right-<?php echo e($key+1); ?>" class="collapse" data-parent="#accordion-control-right" style="">
                    <div class="card-body">

                    <div class="button-group" style="float: right;margin-top: -10px;margin-bottom: 10px;"> 
                     <a data-toggle="modal" model_name="<?php echo e($value->model_name); ?>" model_id= "<?php echo e($value->id); ?>"  data-target="#modal_edit_model" class="btn bg-info-400 btn-icon update_model" data-popup="tooltip" data-original-title="Edit Model" data-placement="bottom"><i class="icon-pencil6"></i></a>

                     <a data-toggle="modal" data-target="#modal_theme_warning" link="<?php echo e(route('vehiclemodel.delete',$value->id)); ?>" class="btn bg-danger-400 btn-icon delete_model" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-trash"></i></a>

                    </div>

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Variant</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!$value->mVariantInfo->isEmpty()): ?>
                                        <?php $__currentLoopData = $value->mVariantInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $variantVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <tr>
                                                <td><?php echo e($key +1); ?></td>
                                                <td><?php echo e($variantVal->variant_name); ?></td>
                                                <td>
                                                    <div class="list-icons">
                                                        <a style="color:red" data-toggle="modal" data-target="#modal_theme_warning" link="<?php echo e(route('vehiclemodel.deleteVar',$variantVal->id)); ?>" class="list-icons-item text-danger-600 delete_feature_val" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <tr><td colspan='3'>No Variant Added</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mt-2">
                             <a data-toggle="modal" data-target="#modal_variant_add_warning" model_name="<?php echo e($value->model_name); ?>" var_model_id= "<?php echo e($value->id); ?>" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left add_more_variant_val" data-popup="tooltip" data-original-title="Add More" data-placement="bottom"><b><i class="icon-add-to-list "></i></b> Add More</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>

</div>
</div>


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



 <!-- Warning modal -->
    <div id="modal_edit_model" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-pink-400">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">

                <?php echo Form::open(['route'=>'vehiclemodel.update','method'=>'POST','id'=>'vehiclemodel_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?>

            
                <?php echo Form::hidden('model_id','', array('id' => 'model_id')); ?>


                <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
                    <fieldset class="mb-1">
                        <legend class="text-uppercase font-size-sm text-danger font-weight-black">Model Update</legend>

                                <div class="row">
                                    <div class="col-lg-12 ">
                                        <div class="row">
                                            <label class="col-form-label col-lg-3">Model Title:<span class="text-danger">*</span></label>
                                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                        </span>
                                                    </span>
                                                   <?php echo Form::text('model_name', $value = null, ['id'=>'model_name','placeholder'=>'Enter Model Title','class'=>'form-control','required']); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                    </fieldset>
                </div>

                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Update</button>
                </div>

                <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->


 <!-- Warning modal -->
    <div id="modal_variant_add_warning" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-pink-400">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">

                <?php echo Form::open(['route'=>'vehiclemodel.updateVar','method'=>'POST','id'=>'vehiclemodel_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?>

            
                <?php echo Form::hidden('model_id','', array('id' => 'add_model_id')); ?>


                <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
                    <fieldset class="mb-1">
                        <legend class="text-uppercase font-size-sm text-danger font-weight-black">Variant Value</legend>


                                <div class="row">

                                    <div class="col-lg-12 ">
                                        <div class="row">
                                            <label class="col-form-label col-lg-2">Variant Value<span class="text-danger">*</span>:<small>(press <span class="badge badge-secondary">tab</span> after every Value)</small></label>
                                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                        </span>
                                                    </span>
                                                 <?php echo e(Form::text('variant_name', null, ['class' => 'form-control tokenfield-teal', 'placeholder' => 'value', 'data-fouc'])); ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                
                    </fieldset>
                </div>

                <div class="text-right">
                    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> Insert</button>
                </div>

                <?php echo Form::close(); ?>


                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->


    
<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_feature_val').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.delete_model').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });


        $('.add_more_variant_val').on('click', function() {
            var model_id = $(this).attr('var_model_id'); 
            var model_name = $(this).attr('model_name'); 
           
           $('#add_model_id').val(model_id);
           $('.modal-title').html('Variant Adde on Model <b>'+model_name+'</b>');
        });

        $('.update_model').on('click', function() {
            var model_id = $(this).attr('model_id'); 
            var model_name = $(this).attr('model_name');
           
           $('#model_id').val(model_id);
           $('#model_name').val(model_name);
           $('.modal-title').html('Updating Model <b>'+model_name+'</b>');
        });



    });

</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/VehicleModel/Resources/views/vehiclemodel/index.blade.php ENDPATH**/ ?>