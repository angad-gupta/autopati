<div class="row">
	<div class="col-xl-12">
		<div class="mb-3">
			<div class="page-header page-header-dark" <?php if($setting != null): ?> style="background-color: <?php echo e($setting->page_header_color); ?>;" <?php endif; ?>>
				<div class="page-header-content header-elements-inline px-3">
					<div class="page-title">
						<h5>
							<i class="icon-arrow-left52 mr-2"></i>
							<span class="font-weight-semibold">Welcome To Autopati CMS</span> - <?php echo $__env->yieldContent('title'); ?>
						</h5>
					</div>

				</div>

				<div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline px-3">
					<div class="d-flex">
						<div class="breadcrumb">
							<a href="<?php echo e(url('admin/dashboard')); ?>" class="breadcrumb-item"><i class="icon-home2 mr-2"></i> Dashboard</a>
							<span class="breadcrumb-item active"><?php echo $__env->yieldContent('breadcrum'); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app\Modules\Admin\Providers/../Resources/views/includes/page_header.blade.php ENDPATH**/ ?>