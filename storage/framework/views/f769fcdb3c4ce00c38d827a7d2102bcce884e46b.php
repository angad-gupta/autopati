    <div class="mt-3 mb-3">
        <div class="row">
            <div class="col-lg-6">
                <form>
                    <div class="form-group w-50 m-0 form-group-feedback form-group-feedback-right mr-3">
                        <div class="input-group">
                            <input type="text" class="form-control border-right-0" placeholder="Search..." name="search_value" value="<?php echo e(request('search_value') ?? ''); ?>">
                            <span class="input-group-append">
                                <button class="btn bg-teal" type="submit"><i class="icon-search4"></i></button>
                            </span>
                            <a href="<?php echo e(url('admin/employee/list')); ?>" data-popup="tooltip" data-placement="top" data-original-title="Refresh Search" class="btn bg-danger ml-2">
                                <i class="icon-spinner9"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-6">
                <div class="w-100 d-flex justify-content-end">
                    <a href="javascript:void(0)" class="btn bg-indigo" data-popup="tooltip" data-placement="top" data-original-title="Download Excel" onclick="exportTableToExcel('employee-list-table', 'employee_list')">
                        <i class="icon-file-excel"></i>
                    </a>
                    <div class="pl-2 justify-content-center filter-employees">
                        <a href="#" class="btn bg-indigo-400 filter-button">
                            <i class="icon-filter3"></i>
                        </a>
                        
                    </div>
                </div>
            </div>
        </div>
    </div><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Employee/Providers/../Resources/views/employee/advance-search.blade.php ENDPATH**/ ?>