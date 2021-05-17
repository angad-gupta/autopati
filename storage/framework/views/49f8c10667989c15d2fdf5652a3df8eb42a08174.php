<?php $__env->startSection('title'); ?>Edit Dropdown Value <?php $__env->stopSection(); ?> 
<?php $__env->startSection('breadcrum'); ?>Edit Dropdown Value <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- Theme JS files -->
<script src="<?php echo e(asset('admin/global/js/plugins/forms/styling/uniform.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_inputs.js')); ?>"></script>
<!-- /theme JS files -->

<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>

<!-- Form inputs -->
<div class="card">
    <div class="card-header bg-teal-400 header-elements-inline">
        <h5 class="card-title">Edit Dropdown Value</h5>
        <div class="header-elements">

        </div>
    </div>
    
    <div class="card-body">

        <?php echo Form::model($dropdown_val,['method'=>'PUT','route'=>['dropdown.update',$dropdown_val->id],'class'=>'form-horizontal','role'=>'form','files'=>true]); ?> 
        
            <?php echo $__env->make('dropdown::Dropdown.partial.action',['btnType'=>'Save'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        
        <?php echo Form::close(); ?>

    </div>
</div>
<!-- /form inputs -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Dropdown/Providers/../Resources/views/Dropdown/edit.blade.php ENDPATH**/ ?>