<div class="card card-body filter-option <?php echo e(request('search') && request('search') == 'advance' ? '' : 'd-none'); ?>">
    <?php echo Form::open(['method' => 'get', 'route' => 'employee.list']); ?>

    <?php echo e(Form::hidden('search', 'advance')); ?>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                <label class="d-block font-weight-semibold">Select Designation:</label>
                <div class="input-group">
                    <?php echo Form::select('designation_id[]', $designation, request('designation_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                <label class="d-block font-weight-semibold">Select Department:</label>
                <div class="input-group">
                    <?php echo Form::select('department_id[]', $department, request('department_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group mb-0 pt-1 pb-1 pl-3 pr-3">
                <label class="d-block font-weight-semibold">Select Branch:</label>
                <div class="input-group">
                    <?php echo Form::select('branch_id[]', $branches, request('branch_id') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

                </div>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end pt-1 pb-3 pl-3 pr-3">
        <button class="btn bg-primary" type="submit">
            Search Now
        </button>
    </div>
    <?php echo Form::close(); ?>

</div><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Employee/Providers/../Resources/views/employee/partial/search.blade.php ENDPATH**/ ?>