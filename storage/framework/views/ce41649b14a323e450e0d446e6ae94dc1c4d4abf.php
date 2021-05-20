<?php $__env->startSection('title'); ?>User Role <?php $__env->stopSection(); ?> 
<?php $__env->startSection('breadcrum'); ?>Create Role <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- Theme JS files -->
<script src="<?php echo e(asset('admin/global/js/plugins/forms/styling/uniform.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_inputs.js')); ?>"></script>
<!-- /theme JS files -->

<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>

<!-- Form inputs -->
<div class="card">
    <div class="card-header bg-teal-400 header-elements-inline">
        <h5 class="card-title">Create Role</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        <?php echo Form::open(['route'=>'role.store','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]); ?> 
            <?php echo $__env->make('user::role.partial.action',['btnType'=>'Save'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <?php echo Form::close(); ?>

        
    </div>
</div>
<!-- /form inputs -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/User/Providers/../Resources/views/role/create.blade.php ENDPATH**/ ?>