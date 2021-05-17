<?php $__env->startSection('title'); ?>Spec Configuration <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>Spec Configuration <?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?> 



<div class="card card-body bg-pink-400" style="background-image: url(http://demo.interface.club/limitless/assets/images/bg.png);">
    <div class="media">
        <div class="mr-3 align-self-center">
            <i class="icon-wave icon-2x"></i>
        </div>

        <div class="media-body text-center">
            <h5 class="media-title font-weight-semibold">List of Spec Managemnt</h5>
            <span class="opacity-75">Did you want to add Spec ? If yes, <a href="<?php echo e(route('spec.create')); ?>" target="_blank" class="text-light">Click Me !</a></span>
		</div>
		
		
    </div>
</div>

<div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
<div class="mb-0">
<?php echo Form::open(['route'=>'configurationexcel.store','method'=>'POST','id'=>'configurationexcel_submit','class'=>'form-horizontal','role'=>'form','files' => true]); ?>


<div class="col-lg-6">
	<div class="row">
		<label class="col-form-label col-lg-3">Choose Feature Excel File:</label>
		<div class="col-lg-3 form-group-feedback form-group-feedback-right">
			<div class="input-group mt-1">
			
			   <?php echo Form::file('excelfile', $value = null, ['id'=>'excelfile','class'=>'form-control']); ?>

			</div>
		</div>

		<div class="">
			<button type="submit" class="ml-2 mt-1 btn bg-success-600 btn-labeled btn-labeled-left"><b><i class=" icon-folder-upload3"></i></b> Upload</button>
		</div>
	</div>
</div>

<?php echo Form::close(); ?>

</div>
</div>


<div class="card-group-control card-group-control-right" id="accordion-control-right">

<div class="row"> 
	 <?php if($spec->total() != 0): ?> 
        <?php $__currentLoopData = $spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <?php $configuration = app('\App\Modules\Configuration\Repositories\ConfigurationRepository'); ?>
        <?php
         $totalConfig = $configuration->countBySpecId($value->id);
        ?>
        
        <div class="col-lg-4">
			<div class="card <?php if($totalConfig > 0): ?> border-top-success <?php endif; ?> " style="margin-bottom: 10px;">
				<div class="card-header bg-alpha-grey" style="padding-top: 10px;padding-bottom: 10px;">
					<h6 class="card-title">
						<a data-toggle="collapse" class="text-default collapsed" href="#accordion-control-right-<?php echo e($key+1); ?>" aria-expanded="false"><?php if($totalConfig > 0): ?> <span class="badge badge-mark border-success-600 mr-2"></span> <?php endif; ?> #<?php echo e($key+1); ?> <?php echo e($value->spec_title); ?> - <b><?php echo e($value->automobile); ?> </b></a>
					</h6>
				</div>

				<div id="accordion-control-right-<?php echo e($key+1); ?>" class="collapse" data-parent="#accordion-control-right" style="">
					<div class="card-body">

						<?php if($totalConfig > 0): ?>

							<div class="media align-items-center align-items-md-start flex-column flex-md-row">
								<a href="<?php echo e(route('configuration.view',['spec_id'=>$value->id])); ?>" class="text-teal mr-md-3 align-self-md-center mb-3 mb-md-0">
									<i class="icon-eye text-success-400 border-success-400 border-3 rounded-round p-2"></i>
								</a>

								<div class="media-body text-center text-md-left">
									<h6 class="media-title font-weight-semibold">Want to Add More Spec Data ?</h6>
									You have <?php echo e($totalConfig); ?> Feature/s in <b><?php echo e($value->spec_title); ?></b> Specification.
								</div>

								<a href="<?php echo e(route('configuration.create',['spec_id'=>$value->id])); ?>" class="btn bg-teal-400 align-self-md-center ml-md-3 mt-3 mt-md-0"><i class="icon-cogs mr-2"></i> Configure</a>
							</div>

						<?php else: ?>

							<div class="media align-items-center align-items-md-start flex-column flex-md-row">
								<a href="#" class="text-teal mr-md-3 align-self-md-center mb-3 mb-md-0">
									<i class="icon-question7 text-warning-400 border-warning-400 border-3 rounded-round p-2"></i>
								</a>

								<div class="media-body text-center text-md-left">
									<h6 class="media-title font-weight-semibold">Can't find what you're looking for?</h6>
									You haven't Added Configuration Under <b><?php echo e($value->spec_title); ?></b> Specification. Please Configure.
								</div>

								<a href="<?php echo e(route('configuration.create',['spec_id'=>$value->id])); ?>" class="btn bg-warning-400 align-self-md-center ml-md-3 mt-3 mt-md-0"><i class="icon-cogs mr-2"></i> Configure</a>
							</div>
						
						<?php endif; ?>
						
					</div>
				</div>
			</div>
		</div>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	<?php endif; ?>

</div>
</div>




<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Configuration\Resources/views/configuration/index.blade.php ENDPATH**/ ?>