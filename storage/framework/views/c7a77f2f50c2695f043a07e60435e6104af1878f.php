<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_select2.js')); ?>"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                <?php echo Form::text('title', $value = null, ['id'=>'service_category_name','placeholder'=>'Enter Service Category Name','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Status:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                                <?php echo Form::select('status',[ '1'=>'Enabled','2'=>'Disabled'], $value = null, ['id'=>'status','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> <?php echo e($btnType); ?></button>
</div>




<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/ServiceCategory/Resources/views/servicecategory/partial/action.blade.php ENDPATH**/ ?>