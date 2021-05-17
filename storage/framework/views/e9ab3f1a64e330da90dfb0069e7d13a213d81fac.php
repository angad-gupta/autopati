<script src="<?php echo e(asset('admin/global/js/plugins/ui/fab.min.js')); ?>"></script>

<script src="<?php echo e(asset('admin/global/js/plugins/ui/sticky.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/ui/prism.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/extra_fab.js')); ?>"></script>

<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>
        <button type="submit" class="fab-menu-btn btn bg-pink-300 btn-float rounded-round btn-icon"><i
                    class="icon-database-insert" data-popup="tooltip" data-placement="bottom"
                    data-original-title="<?php echo e($btnType); ?>"></i></button>

    </li>
</ul>
<!-- /top right menu -->


<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="form-group row">
        <label class="col-form-label col-lg-2">Role Name:<span class="text-danger">*</span></label>
        <div class="col-lg-10">
            <?php echo Form::text('name', $value = null, ['id'=>'name','placeholder'=>'Enter Role Name','class'=>'form-control','required' =>'required']); ?>

        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-2">Select User Type :<span class="text-danger">*</span></label>
        <div class="col-lg-10 form-group-feedback form-group-feedback-right">
            <div class="input-group">
                <span class="input-group-prepend">
                    <span class="input-group-text"><i class="icon-users"></i></span>
                </span>
                <?php echo Form::select('user_type',$user_type ,$value = null, ['id'=>'user_type','class'=>'form-control']); ?>

            </div>
        </div>
    </div>

</fieldset>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-dark text-white d-flex justify-content-between">
                <h6 class="card-title">List of Modules</h6>
            </div>
        </div>
    </div>
</div>

<?php
    $module =array();
    $num = 1;
    $route_name = array();
    $route_list = array();
?>

<?php $__currentLoopData = $routes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $explode_module = explode(' ',$value);
        $route = $explode_module[0];
        $module[$route][$key] = $value;
        $route_name[] = $route;
        $num++;
    ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php
    $unique_route = array_unique($route_name);
?>

<div class="row">
    <?php $__currentLoopData = $unique_route; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $routeKey => $routeVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-grey-400 text-white header-elements-inline">
                    <h6 class="card-title"><?php echo e($routeVal); ?></h6>
                    <div class="header-elements">
                        <button type="button" class="btn bg-success btn-icon select_all" data-popup="tooltip"
                                data-placement="top" data-original-title="Select All"><i
                                    class="icon-checkmark-circle2"></i></button>
                        <button type="button" class="btn bg-warning btn-icon ml-3 clear_all" data-popup="tooltip"
                                data-placement="top" data-original-title="Clear All"><i class="icon-eraser2"></i>
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <?php
                        $new_module = array_shift($module);
                    ?>

                    <?php $__currentLoopData = $new_module; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $modkey => $modVal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $explode_module = explode(' ',$modVal);
                            $checked = '';

                            $module_name = (isset($explode_module[1])) ? $explode_module[1] : $explode_module[0];

                        ?>
                        <?php if($routeVal == $explode_module[0]): ?>


                            <?php if(count($permission) > 0): ?>
                                <?php
                                    $test['route_name']=$modkey;
                                if(in_array($test,$permission))
                                {
                                    $checked = "checked='checked'";
                                }
                                ?>
                            <?php endif; ?>

                            <div class="form-check">
                                <label class="form-check-label">
                                    <input <?php echo e($checked); ?> type="checkbox" name="route_name[]" value="<?php echo e($modkey); ?>"
                                           class='form-check-input module_checkbox'/> <?php echo e($module_name); ?>

                                </label>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="text-right">
    <button type="submit" class="btn bg-teal-400"><?php echo e($btnType); ?> <i class="icon-database-insert"></i></button>
</div>


<script type="text/javascript">

    $(document).ready(function () {

        $(document).on('click', '.select_all', function () {
            $(this).parent().parent().siblings().find('.module_checkbox').prop('checked', 'true');
        });

        $(document).on('click', '.clear_all', function () {
            $(this).parent().parent().siblings().find('.module_checkbox').prop('checked', false);
        });

    });

</script><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/User/Providers/../Resources/views/role/partial/action.blade.php ENDPATH**/ ?>