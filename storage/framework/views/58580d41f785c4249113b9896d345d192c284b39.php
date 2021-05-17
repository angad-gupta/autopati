<?php $__env->startSection('title'); ?>Banner <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>Banner <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('admin/global/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?> 


 <div class="card">
        <div class="card-header bg-purple-400 header-elements-inline">
            <a href="<?php echo e(route('banner.create')); ?>" class="btn bg-success-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-add-to-list"></i></b> Add Banner</a>
        </div>
    </div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of Banners</h5>

    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr class="bg-slate">
                    <th>#</th>
                    <th>Banner Title</th>
                    <th>Image</th>
                    <th>Add To Luxury</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if($banner_info->total() != 0): ?> 
                <?php $__currentLoopData = $banner_info; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <?php
                $image = ($value->banner_image) ? asset($value->file_full_path).'/'.$value->banner_image : asset('admin/default.png');
                ?>
                <tr>
                    <td><?php echo e($banner_info->firstItem() +$key); ?></td>
                    <td><?php echo e($value->banner_title); ?></td>
                    <td><a target="_blank" href="<?php echo e($image); ?>"><img src="<?php echo e($image); ?>" style="width: 50px;"></a></td>
                    
                    <td class="<?php echo e(($value->add_to_luxury == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold'); ?>"><?php echo e(($value->add_to_luxury == '1') ? 'Yes' :'No'); ?></td>

                    <td class="<?php echo e(($value->status == '1') ? 'text-success font-weight-bold' :'text-danger font-weight-bold'); ?>"><?php echo e(($value->status == '1') ? 'Enabled' :'Disabled'); ?></td>
                    <td>
                        <a class="btn bg-teal-400 btn-icon rounded-round" href="<?php echo e(route('banner.edit',$value->id)); ?>" data-popup="tooltip" data-original-title="Edit" data-placement="bottom"><i class="icon-pencil6"></i></a>

                        <a data-toggle="modal" data-target="#modal_theme_warning" class="btn bg-danger-400 btn-icon rounded-round delete_banner" link="<?php echo e(route('banner.delete',$value->id)); ?>" data-popup="tooltip" data-original-title="Delete" data-placement="bottom"><i class="icon-bin"></i></a>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <td colspan="6">No Banner Found !!!</td>
                </tr>
                <?php endif; ?>
            </tbody>

        </table>

        <span style="margin: 5px;float: right;">
            <?php if($banner_info->total() != 0): ?>
                <?php echo e($banner_info->links()); ?>

            <?php endif; ?>
            </span>
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

<!-- /warning modal -->

    
<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_banner').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });
    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Banner\Resources/views/banner/index.blade.php ENDPATH**/ ?>