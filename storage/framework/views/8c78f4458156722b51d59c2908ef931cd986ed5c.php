<?php $__env->startSection('title'); ?>Page <?php $__env->stopSection(); ?> 
<?php $__env->startSection('breadcrum'); ?>Update Page <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<!-- Theme JS files -->
<script src="<?php echo e(asset('admin/global/js/plugins/forms/styling/uniform.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_inputs.js')); ?>"></script>
<script src="<?php echo e(asset('admin/validation/page.js')); ?>"></script>

<!-- /theme JS files -->

<?php $__env->stopSection(); ?> <?php $__env->startSection('content'); ?>

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Page</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        <?php echo Form::model($page,['method'=>'PUT','route'=>['page.update',$page->id],'class'=>'form-horizontal','id'=>'page_submit','role'=>'form','files'=>true]); ?> 
        	
        	<?php echo $__env->make('page::page.partial.action',['btnType'=>'Update'], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        
        <?php echo Form::close(); ?>

    </div>
</div>
<!-- /form inputs -->

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Page/Providers/../Resources/views/page/edit.blade.php ENDPATH**/ ?>