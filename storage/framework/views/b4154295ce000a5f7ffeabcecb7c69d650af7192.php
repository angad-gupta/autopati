<?php $__env->startSection('title'); ?>Setting <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>Create Setting <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <!-- Theme JS files -->
    <script src="<?php echo e(asset('admin/global/js/plugins/forms/styling/uniform.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/demo_pages/form_inputs.js')); ?>"></script>
    <!-- /theme JS files -->
    <script src="<?php echo e(asset('admin/validation/setting.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/plugins/pickers/color/spectrum.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/demo_pages/picker_color.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/plugins/forms/styling/uniform.min.js')); ?>"></script>
    <script src="<?php echo e(asset('admin/global/js/plugins/forms/styling/switch.min.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.form-check-input-styled').uniform();
        });
    </script>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card bd-card">
                <div class="bg-white card-header header-elements-inline">
                    <h6 class="card-title">Setting</h6>
                </div>
                <div class="card-body">
                   <ul class="nav nav-tabs nav-tabs-bottom border-bottom-0" style="position: absolute;">
                        <li class="nav-item"><a href="#bottom-divided-tab1" class="btn alpha-pink rounded-round nav-link active show" data-toggle="tab"><i class="text-slate-700 icon-cog mr-2"></i><span class="text-dark">Basic Setting</span></a>
                        </li>
                        <li class="nav-item"><a href="#bottom-divided-tab2" class="ml-3 alpha-pink rounded-round nav-link" data-toggle="tab"><i class="text-primary-400 icon-bucket mr-2"></i><span class="text-dark">Color Setting</span></a></li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="bottom-divided-tab1">
                            <div style="margin-top: 64px;">
                                <form action="<?php echo e(route('setting.basicsetting')); ?>" method="post"
                                      enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo $__env->make('setting::setting.partial.basic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="text-right">
                                        <button type="submit" class="btn bg-teal-400"><i class="icon-plus-circle2"></i>
                                            Save Basic Setting
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="tab-pane fade"  id="bottom-divided-tab2">
                            <div style="margin-top: 64px;">
                                <form action="<?php echo e(route('setting.basicsetting')); ?>" method="post"
                                      enctype="multipart/form-data">
                                    <?php echo e(csrf_field()); ?>

                                    <?php echo $__env->make('setting::setting.partial.color', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                    <div class="text-right">
                                        <button type="submit" class="btn bg-teal-400"><i class="icon-plus-circle2"></i>
                                            Save Color Setting
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Setting/Providers/../Resources/views/setting/create.blade.php ENDPATH**/ ?>