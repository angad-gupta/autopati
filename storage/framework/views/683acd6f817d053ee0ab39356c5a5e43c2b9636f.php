<?php $__env->startSection('title'); ?>Employee <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>Employee <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="<?php echo e(asset('admin/global/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/pickers/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/picker_date.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/bootstrap_multiselect.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_multiselect.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<?php echo $__env->make('employee::employee.partial.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<div class="card card-body" id="employee-list-card">
    <div class="d-flex justify-content-between">
        <h4>Employee List</h4>
    </div>
    <?php echo $__env->make('employee::employee.advance-search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="table-responsive">
        <table class="<?php echo e(config('admin.table-class')); ?>" id="employee-list-table">
            <thead>
                <tr class="<?php echo e(config('admin.table-header-class')); ?>">
                    <th>#</th>
                    <th>Name</th>
                    <th>Branch</th>
                    <th>Designation</th>
                    <th>Join Date</th>
                    <th>Contact Number</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(++$loop->index); ?></td>
                    <td><?php echo e($employee->first_name); ?> <?php echo e($employee->last_name); ?></td>
                    <td><?php echo e(optional($employee->branchValue)->dropvalue); ?></td>
                    <td><?php echo e(optional($employee->designation)->dropvalue); ?></td>
                    <td title="<?php echo e(date_converter()->eng_to_nep_convert($employee->join_date)); ?>"><?php echo e($employee->join_date); ?></td>
                    <td><?php echo e($employee->mobile); ?></td>
                    <td>
                        <?php if($employee->status == '1'): ?>
                        <a href="javascript:void(0)" class="btn btn-outline bg-success btn-icon text-success border-success border-2 rounded-round" data-popup="tooltip" data-placement="bottom" data-original-title="Active Employer">
                            <i class="icon-checkmark4"></i>
                        </a>
                        <?php else: ?>
                        <a href="javascript:void(0)" class="btn btn-outline bg-danger btn-icon text-danger border-danger border-2 rounded-round" data-popup="tooltip" data-placement="bottom" data-original-title="In-Active Employer">
                            <i class="icon-cross2"></i>
                        </a>
                        <?php endif; ?>
                    </td>
                    <td class="text-right">
                        <div class="dropdown">
                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                <i class="icon-more2"></i>
                            </a>
                            <div class="dropdown-menu bd-card dropdown-menu-right">
                                <a data-toggle="modal" data-target="#modal_view_employee" class="dropdown-item view_employee" employee_id="<?php echo e($employee->id); ?>">
                                    <i class="icon-eye"></i> View Detail
                                </a>
                                <a class="dropdown-item view_employee" href="<?php echo e(route('employee.print', $employee->id)); ?>" target="_blank">
                                    <i class="icon-printer2"></i> Print / Download Detail
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <span style="margin: 5px;float: right;">
            <?php if($employees->total() != 0): ?> 
            <?php echo e($employees->appends(request()->all())->links()); ?>

            <?php endif; ?>
        </span>
    </div>
</div>


<div id="modal_view_employee" class="modal fade" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h6 class="modal-title">View Detail of Employee</h6>
            </div>
            <div class="modal-body">
                <div class="table-responsive result_view_detail">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-teal-400" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready( function () {
        $('.view_employee').click( function () {
            var employee_id = $(this).attr('employee_id');
            $.ajax({
                type: 'GET',
                url: '/admin/employee/view',
                data: {
                    id: employee_id
                },

                success: function(response) {
                    $('.result_view_detail').html(response);
                }
            });
        });
    });

</script>
<script>
    function exportTableToExcel(tableID, filename = ''){
        var downloadLink;
        var dataType = 'application/vnd.ms-excel';
        var tableSelect = document.getElementById(tableID);
        var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

// Specify file name
filename = filename ? filename+'.xlsx':'excel_data.xlsx';

// Create download link element
downloadLink = document.createElement("a");

document.body.appendChild(downloadLink);

if(navigator.msSaveOrOpenBlob){
    var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
    });
    navigator.msSaveOrOpenBlob( blob, filename);
}else{
// Create a link to the file
downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

// Setting the file name
downloadLink.download = filename;

//triggering the function
downloadLink.click();
}
}
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Employee/Providers/../Resources/views/employee/list.blade.php ENDPATH**/ ?>