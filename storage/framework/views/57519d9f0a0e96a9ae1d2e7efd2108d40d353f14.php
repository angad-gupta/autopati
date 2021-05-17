<?php $__env->startSection('title'); ?>DropDown <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>DropDown <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('admin/global/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
        <a href="<?php echo e(route('dropdown.create')); ?>" class="btn bg-teal-400"><i class="icon-plus-circle2"></i> Add DropDown Value </a>

        <a href="<?php echo e(route('dropdown.createField')); ?>" class="btn bg-warning-400"><i class="icon-plus-circle2"></i> Add DropDown Field </a>

    </div>
</div>

<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">List of DropDown</h5>
    </div>

    <div class="table-responsive">
        <table class="table table-striped" id="table1" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th>List of Field (Note: Click Field To View Dropdown Value) </th>
                </tr>
            </thead>
            <tbody>
                <?php if($field->total() > 0): ?>
                <?php $__currentLoopData = $field; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                <tr>
                    <td><a href="javascript:;" class="toggle_sku"><i rel="allfield" class="icon-plus-circle2"></i>&nbsp;&nbsp;&nbsp; Field: <?php echo e($key->title); ?> :: Slug [ <?php echo e($key->slug); ?> ]</a></td>
                </tr>

                <?php
                $field_value = $key->dropdownValue;
                ?>

                <?php if(count($field_value) > 0): ?>
                <tr style="display: none">
                    <td colspan="8">
                        <table class="table table-striped">
                            <thead>
                                <tr class="text-slate">
                                    <th>Sn.</th>
                                    <th>Dropdown Value</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $j = 1; ?>
                                <?php $__currentLoopData = $field_value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                <tr>
                                    <td>
                                        <?php echo e($j); ?>

                                    </td>
                                    <td>
                                        <?php echo e($val->dropvalue); ?>

                                    </td>
                                    <?php if($val->dropvalue != "admin"): ?>
                                    <td class="table-action">
                                        <a class="btn btn-info btn-sm" href="<?php echo e(route('dropdown.edit',$val->id)); ?>"><i class="fa fa-edit tooltips" data-original-title="Edit Dropdown value"></i> Edit</a> |
                                        <button type="button" class="btn btn-danger btn-sm delete_dropdown" data-toggle="modal" link="<?php echo e(route('dropdown.delete',$val->id)); ?>" data-target="#modal_theme_warning"><i class="fa fa-trash tooltips" data-original-title="Delete Dropdown value"></i> Delete</button>
                                    </td>
                                    <?php endif; ?>
                                </tr>

                                <?php $j++; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
                <?php else: ?>
                <tr style="display: none" class="bg-success-300">
                    <td colspan="8">No Dropdown Value Found</td>
                </tr>
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                <tr>
                    <td colspan="8">
                        <center>No Dropdown Found !!!</center>
                    </td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>


<!-- Warning modal -->
<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <center>
                    <i class="icon-help text-danger icon-8x"></i>
                </center>
                <br>
                <center>
                    <h2>Are You Sure Want To Delete This Contact?</h2>
                    <a class="btn btn-success get_link" href="">Yes, Delete It!</a>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                </center>
            </div>
        </div>
    </div>
</div>
<!-- /warning modal -->

<script type="text/javascript">
    $(document).ready(function() {
        $('.delete_petty').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.delete_dropdown').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.toggle_sku').click(function() {
            $(this).parent().parent().next().toggle('slow');
            $(this).find('i').toggleClass("icon-plus-circle2 icon-minus-circle2");
        });

    });

</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Dropdown/Providers/../Resources/views/Dropdown/index.blade.php ENDPATH**/ ?>