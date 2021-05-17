<?php $__env->startSection('title'); ?>Employment <?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrum'); ?>Employment <?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <style type="text/css">
        .tt-query {
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.075) inset;
        }
        .tt-hint {
            color: #999999;
        }
        .tt-menu {
            background-color: #FFFFFF;
            border: 1px solid rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
            margin-top: 12px;
            padding: 8px 0;
            width: 422px;
        }
        .tt-suggestion {
            font-size: 22px;  /* Set suggestion dropdown font size */
            padding: 3px 20px;
        }
        .tt-suggestion:hover {
            cursor: pointer;
            background-color: #0097CF;
            color: #FFFFFF;
        }
        .tt-suggestion p {
            margin: 0;
        }
        .d-block--active .circular-block {
            background-color: #03a9f4;
        }
        .leave-d-block {
            margin: 1rem 0;
        }
    </style>
    <style>

    </style>
<script src="<?php echo e(asset('admin/global/js/plugins/tables/datatables/datatables.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/validation/uploadEmployee.js')); ?>"></script>
<script src="<?php echo e(asset('admin/typeahead.bundle.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

<div class="card">
    <div class="card-body d-sm-flex align-items-sm-center justify-content-sm-between flex-sm-wrap">
        <a href="<?php echo e(route('employment.create')); ?>" class="btn bg-teal-400"><i class="icon-plus-circle2"></i> Add Employee</a>
        <div>
             <a href="<?php echo e(route('employment.indexArchive')); ?>" class="btn bg-warning mr-1"><i class="icon-folder-download3 mr-2"></i> Archived Employee</a>
             
         </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-4">
        <div class="card card-body border-top-primary">
            <div class="text-center">

                <?php echo Form::model($employments,['method'=>'GET','route'=>['employment.index'],'class'=>'form-horizontal','role'=>'form','files'=>true]); ?>

                <?php echo $__env->make('employment::employment.partial.search-department', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::close(); ?>


            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-body border-top-primary">
            <div class="text-center">
                <?php echo Form::model($employments,['method'=>'GET','route'=>['employment.index'],'class'=>'form-horizontal','role'=>'form','files'=>true]); ?>

                <?php echo $__env->make('employment::employment.partial.search-designation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card card-body border-top-primary">
            <div class="text-center">
                <?php echo Form::model($employments,['method'=>'GET','route'=>['employment.index'],'class'=>'form-horizontal','role'=>'form','files'=>true]); ?>

                <?php echo $__env->make('employment::employment.partial.search', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <?php echo Form::close(); ?>

            </div>
        </div>
    </div>
</div>



<div class="row">

    <?php if($employments->total() != 0): ?>
    <?php $__currentLoopData = $employments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <?php
    if($value->profile_pic !=''){
    $imagePath = asset($value->file_full_path).'/'.$value->profile_pic;
}else{
$imagePath = asset('admin/default.png');
}
?>

<div class="col-md-3 col-ls-2">
    <div class="card">
        <div class="card-img-actions mx-1 mt-1 text-center">
            <figure style="height:150px; width:150px; margin: 20px auto 0; "  class="text-center">
                <img class="rounded-round"  style="width: 100%; height: 100%; object-fit: cover; border: 1px solid #eeeeec" src="<?php echo e($imagePath); ?>" alt="">
            </figure>
            <div class="card-img-actions-overlay card-img">
               <?php
               $UserInfo = App\Modules\Employment\Entities\Employment::getUserInfoByEmp($value->id);
               ?>
               <input type="hidden" value="<?php echo e($UserInfo->parent_id ?? ''); ?>" id="user_parent_id_<?php echo e($value->id); ?>" />

                <?php if($value->is_user_access == '1'): ?>
                    <a class="btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round" href="javascript:void()" data-popup="tooltip" data-placement="bottom" data-original-title="User Access Granted"><i class="icon-user-check"></i></a>
                <?php else: ?>
                    <a data-toggle="modal" data-target="#modal_theme_success" class="ml-1 btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round employer_user_access" emp_id="<?php echo e($value->id); ?>" data-popup="tooltip" data-placement="bottom" data-original-title="User Access"><i class="icon-user-plus"></i></a>
                <?php endif; ?>
                <?php if($value->is_parent_link == '1'): ?>
                    <a data-toggle="modal" data-target="#modal_parent_link" class="ml-1 btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round user_parent_link" empId="<?php echo e($value->id); ?>" data-placement="bottom" data-popup="tooltip" data-placement="top" data-original-title="Link With Parent"><i class="icon-user-check"></i></a>
                <?php else: ?>
                    <a data-toggle="modal" data-target="#modal_parent_link" class="ml-1 btn btn-outline bg-white text-white border-white border-2 btn-icon rounded-round user_parent_link" empId="<?php echo e($value->id); ?>" data-placement="bottom" data-popup="tooltip" data-placement="top" data-original-title="Link With Parent"><i class="icon-user-plus"></i></a>
                <?php endif; ?>
           </div>
       </div>

       <div class="card-body text-center">
        <h6 class="font-weight-semibold mb-0"><a href="javascript:void(0)" class="text-warning"><?php echo e($value->first_name .' '. $value->middle_name.' '. $value->last_name); ?></a></h6>
        <span class="d-block text-muted"><?php echo e($value->designation->dropvalue); ?></span>

        <ul class="list-inline list-inline-condensed mt-3 mb-0">
            <li class="list-inline-item">
                <?php if($value->status == '1'): ?>
                <a data-toggle="modal" data-target="#modal_theme_warning_status" class="btn btn-outline bg-success btn-icon text-success border-success border-2 rounded-round status_employee" employee_id="<?php echo e($value->id); ?>" data-popup="tooltip" data-placement="bottom" data-original-title="Move To Archive">
                    <i class="icon-basket"></i>
                </a>
                <?php else: ?>
                <a data-toggle="modal" data-target="#modal_theme_warning_status" class="btn btn-outline bg-danger btn-icon text-danger border-danger border-2 rounded-round status_employee" employee_id="<?php echo e($value->id); ?>" data-popup="tooltip" data-placement="bottom" data-original-title="In-Active Employer">
                
                    Move To Active
                </a>
                <?php endif; ?>

            </li>
            <li class="list-inline-item"><a href="<?php echo e(route('employment.edit',$value->id)); ?>" class="btn btn-outline bg-info btn-icon text-info border-info border-2 rounded-round" data-popup="tooltip" data-placement="bottom" data-original-title="Edit Employee">
                <i class="icon-pencil"></i></a>
            </li>
        </ul>
    </div>
    <?php
    if($value->status == '1'){
    $status = 'Active';
    $color = 'bg-success-400';
}else{
$status = 'InActive';
$color = 'bg-danger-400';
}
?>
<div class="ribbon-container">
    <div class="ribbon <?php echo e($color); ?>">
        <a class="text-light" href="" data-popup="tooltip" data-original-title="Employee Status" data-placement="bottom"><?php echo e($status); ?></a>
    </div>
</div>
</div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php endif; ?>
</div>

<span style="margin: 5px;float: right;">
    <?php if($employments->total() != 0): ?>
    <?php echo e($employments->links()); ?>

    <?php endif; ?>
</span>

<!-- Warning modal -->
<div id="modal_parent_link" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title">Select Respective Department Head</h6>
            </div>

            <div class="modal-body">
               <?php echo Form::open(['route'=>'employment.updateType','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]); ?>


               <div class="form-group row">
                <label class="col-form-label col-lg-3">Select Parent Dept:</label>
                <div class="col-lg-9">
                    <select name="parent_id" class="form-control parent_id">
                        <?php
                        $HeadInfo = App\Modules\Employment\Entities\Employment::getHeadDept();
                        ?>

                        <?php $__currentLoopData = $HeadInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>  
                        <?php
                        $user_type_explode = ucfirst(str_replace("_"," ",$value['user_type']));
                        ?>
                        <option value="<?php echo e($value['id']); ?>"><?php echo e($value['first_name'].' :: '.$user_type_explode); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </select>
                </div>
            </div>

            <?php echo e(Form::hidden('employerId', '', array('class' => 'employerId'))); ?>


            <div class="text-center">
                <button type="submit" class="create_user_access btn bg-success">Link User</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>

            <?php echo Form::close(); ?>


        </div>

        <div class="modal-footer">
        </div>
    </div>
</div>
</div>
<!-- warning modal -->


<!-- Warning modal -->
<div id="modal_theme_warning" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title">Are you sure to Delete a Employee ?</h6>
            </div>

            <div class="modal-body">
                <a class="btn btn-success get_link" href="">Yes</a> &nbsp; | &nbsp;
                <button type="button" class="btn btn-success" data-dismiss="modal">No</button>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- warning modal -->


<!-- Warning modal -->
<div id="modal_theme_warning_status" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h6 class="modal-title">Are You Sure Want To Move On Archive State ?</h6>
            </div>

            <div class="modal-body">
                <?php echo Form::open(['route'=>'employment.update.status.user','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]); ?>

                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Archive Reason:</label>
                    <div class="col-lg-9">
                        <input type="hidden" class="employee_archive_id"  name="employee_id">
                        <?php echo Form::textarea('archive_reason', $value = null, ['id'=>'archive_reason','placeholder'=>'Enter Reason for Archive','class'=>'form-control','required'=>'required']); ?>

                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="create_user_access btn bg-success">Move To Archive</button>
                    <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
                </div>
                <?php echo Form::close(); ?>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- warning modal -->



<!-- Warning modal -->
<div id="modal_theme_success" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-pink-800">
                <h6 class="modal-title">Create Employer User Access</h6>
            </div>

            <div class="modal-body">

                <?php echo Form::open(['route'=>'employment.createUser','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]); ?>


                <div class="form-group row">
                    <label class="col-form-label col-lg-3">User Name:</label>
                    <div class="col-lg-6">
                        <?php echo Form::text('username', $value = null, ['id'=>'username','placeholder'=>'Enter User Name','class'=>'form-control','required'=>'required','pattern'=>'.{5,}','title'=>'5 characters minimum']); ?>

                        <?php echo e(Form::hidden('user_exist', '0', array('class' => 'user_exist'))); ?>

                        <span class="error_username"></span>
                    </div>
                    <div class="col-lg-3">
                        <button type="button" class="check_available btn bg-success">Check Availability</button>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Email:</label>
                    <div class="col-lg-9">
                        <?php echo Form::email('email', $value = null, ['id'=>'email','placeholder'=>'Enter Email','class'=>'form-control','required'=>'required']); ?>

                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-lg-3">Password:</label>
                    <div class="col-lg-9">
                        <?php echo Form::text('password', $value = null, ['id'=>'password','placeholder'=>'Enter Password','class'=>'form-control','required'=>'required','pattern'=>'.{8,}','title'=>'8 characters minimum']); ?>

                    </div>
                </div>
                  
                 <fieldset>
                        <legend class="text-uppercase font-size-sm font-weight-bold">Assign Role</legend>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <div class="row">
                                    <label class="col-form-label col-lg-3">Select User Role :<span
                                            class="text-danger">*</span></label>
                                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                        <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text"><i class="icon-user-tie"></i></span>
                                        </span>
                                            <?php echo Form::select('role_id',$roles, $value = null, ['id'=>'role_id','class'=>'form-control','placeholder'=>'Enter Role','required'=>'required']); ?>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>

            <?php echo e(Form::hidden('employer_id', '', array('class' => 'employer_id'))); ?>


            <div class="text-center">
                <button type="submit" class="create_user_access btn bg-success">Create User Access</button>
                <button type="button" class="btn bg-danger" data-dismiss="modal">Close</button>
            </div>

            <?php echo Form::close(); ?>



        </div>

        <div class="modal-footer">
        </div>
    </div>
</div>
</div>
<!-- warning modal -->

<script type="text/javascript">
    $('document').ready(function() {
        $('.delete_employeen').on('click', function() {
            var link = $(this).attr('link');
            $('.get_link').attr('href', link);
        });

        $('.status_employee').on('click', function() {
            var  employee_id= $(this).attr('employee_id');
            $('.employee_archive_id').attr('value', employee_id);

        });

        $('.user_parent_link').on('click', function() {
            var empId = $(this).attr('empId');
            $('.employerId').val(empId);
            $('.parent_id').val($('#user_parent_id_'+empId).val());
        });
        
        $('.employer_user_access').on('click', function() {
            var emp_id = $(this).attr('emp_id');
            $('.employer_id').val(emp_id);
        });

        $('.check_available, .create_user_access').on('click', function(event) {

            var username = $('#username').val();
            var user_exist = $('.user_exist').val();

            if (user_exist == '1') {
                $('#username').focus();
                event.preventDefault();
            }

            $.ajax({
                type: 'GET',
                url: 'employment/checkAvailability',
                data: {
                    username: username
                },
                async: false,
                success: function(data) {

                    if (data == 1) {
                        $('#username').css('border-color', 'red');
                        $('.error_username').html('<i class="icon-thumbs-down3 mr-1"></i> Username Already Exists.');
                        $('.error_username').removeClass('text-success');
                        $('.error_username').addClass('text-danger');
                        $('.user_exist').val('1');
                        $('#username').focus();
                        event.preventDefault();
                    } else {
                        $('#username').css('border-color', 'green');
                        $('.error_username').html('<i class="icon-thumbs-up3 mr-1"></i>User Available.');
                        $('.error_username').removeClass('text-danger');
                        $('.error_username').addClass('text-success');
                        $('.user_exist').val('0');
                    }

                }
            });
        });

    });

</script>
<script type="text/javascript">
    $(document).ready(function(){
        // Defining the local dataset
       var path = "<?php echo e(route('employment.autocomplete')); ?>";
       var employee = new Bloodhound({
            datumTokenizer: Bloodhound.tokenizers.whitespace,
            queryTokenizer: Bloodhound.tokenizers.whitespace,
            // The url points to a json file that contains an array of country names
            prefetch: path
        });

        // Initializing the typeahead with remote dataset
        $('.typeahead').typeahead(null, {
            name: 'employee',
            source: employee,
            limit: 10 /* Specify maximum number of suggestions to be displayed */
        });


        var promises = [];

        $('#spinner-light-4').on('click', function() {
            var light_4 = $('body');
            var request = $(light_4).block({
            message: '<span class="test-center"><i class="icon-spinner9 spinner" style="font-size: 100px;"></i><h2 class="text-danger" style="width: 300px;">Please Wait While Uploading...</h2></span>',
            overlayCSS: {
                    backgroundColor: '#fff',
                    opacity: 0.8,
                    cursor: 'wait'
                },
                css: {
                    border: 0,
                    padding: 50,
                    backgroundColor: 'none'
                }
            });
            promises.push(request);
        });
        $.when.apply(null, promises).done(function(){
            $(light_4).unblock();
        });

    });
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin::layout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Employment/Providers/../Resources/views/employment/index.blade.php ENDPATH**/ ?>