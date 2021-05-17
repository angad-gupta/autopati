<?php $__env->startSection('title'); ?>Spec Configuration Features <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>Spec Configuration Features <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('admin/validation/dynamicblock.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_tags_input.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/global/js/plugins/forms/tags/tokenfield.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 

<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>

     <a href="<?php echo e(route('configuration.index')); ?>" class="fab-menu-btn btn bg-danger btn-float rounded-round btn-icon"><i class="icon-arrow-left15" data-popup="tooltip" data-placement="bottom" data-original-title="Back To configuration"></i></a>

 </li>
</ul>
<!-- /top right menu -->

<div class="card card-body bg-purple-400" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png);">
    <div class="media">
        <div class="mr-3 align-self-center">
            <i class="icon-gallery icon-2x"></i>
        </div>

        <div class="media-body text-center">
            <h5 class="media-title font-weight-semibold">List of <?php echo e($spec->spec_title); ?>  (Type :: <?php echo e($spec->automobile); ?>)</h5>
            <span class="opacity-75">Did you want to add Configuration Features ? If yes, <a href="<?php echo e(route('configuration.create',['spec_id'=>$spec_id])); ?>" target="_blank" class="text-light">Click Me !</a></span>
        </div>
    </div>
</div>

<div class="card-group-control card-group-control-right" id="accordion-control-right">

<div class="row"> 
     <?php if($configInfo->total() != 0): ?> 
        <?php $__currentLoopData = $configInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        
        <div class="col-lg-3">
            <div class="card" style="margin-bottom: 10px;">
                <div class="card-header bg-grey" style="padding-top: 10px;padding-bottom: 10px;">
                    <h6 class="card-title">
                        <a data-toggle="collapse" class="text-default collapsed" href="#accordion-control-right-<?php echo e($key+1); ?>" aria-expanded="false">#<?php echo e($key+1); ?>  <b><?php echo e($value->title); ?></b></a>
                    </h6>
                </div>

                <div id="accordion-control-right-<?php echo e($key+1); ?>" class="collapse" data-parent="#accordion-control-right" style="">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Features</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!$value->ConfigVal->isEmpty()): ?>
                                    <?php $__currentLoopData = $value->ConfigVal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $confvalue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($key +1); ?></td>
                                            <td><?php echo e($confvalue->config_value); ?></td>
                                            <td>
                                                <div class="list-icons">
                                                    <a style="color:red" data-toggle="modal" data-target="#modal_theme_warning" link="<?php echo e(route('configuration.deleteVal',$confvalue->id)); ?>" class="list-icons-item text-danger-600 delete_feature_val" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-trash"></i></a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                     <?php else: ?>
                                        <tr><td colspan='3'>No Features Added</td></tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right mt-2">
                             <a data-toggle="modal" data-target="#modal_feature_add_warning" feature= "<?php echo e($value->title); ?>" config_id="<?php echo e($value->id); ?>" spec_id ="<?php echo e($spec_id); ?>" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left add_more_feature_val" data-popup="tooltip" data-original-title="Add More" data-placement="bottom"><b><i class="icon-add-to-list "></i></b> Add More</a>
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
    <div id="modal_feature_add_warning" class="modal fade" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-pink-400">
                    <h5 class="modal-title"></h5>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">

                <?php echo Form::open(['route'=>'configuration.update','method'=>'POST','id'=>'configuration_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?>

            
                <?php echo Form::hidden('spec_id','', array('id' => 'spec_id')); ?>

                <?php echo Form::hidden('config_id','', array('id' => 'config_id')); ?>


                <div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
                    <fieldset class="mb-1">
                        <legend class="text-uppercase font-size-sm text-danger font-weight-black">Features Value</legend>


                                <div class="row">

                                    <div class="col-lg-12 ">
                                        <div class="row">
                                            <label class="col-form-label col-lg-3">Features Value<span class="text-danger">*</span>:<small>(press <span class="badge badge-secondary">tab</span> after every Value)</small></label>
                                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                                        </span>
                                                    </span>
                                                  <?php echo e(Form::text('config_value', null, ['class' => 'form-control tokenfield-teal', 'placeholder' => 'value', 'data-fouc'])); ?>

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


        $('.add_more_feature_val').on('click', function() {
            var spec_id = $(this).attr('spec_id');
            var config_id = $(this).attr('config_id');
            var feature = $(this).attr('feature');
           
           $('#spec_id').val(spec_id);
           $('#config_id').val(config_id);
           $('.modal-title').html('Configuration Features of <b>'+feature+'</b>');
        });



    });

</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Configuration/Resources/views/configuration/view.blade.php ENDPATH**/ ?>