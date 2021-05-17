<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Dropdown Field :</label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-list2"></i></span>
                        </span>
            <?php echo Form::select('fid',$field, $value = null, ['id'=>'fid','placeholder'=>'Select Dropdown Field','class'=>'form-control']); ?>

        </div>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-form-label col-lg-3">Dropdown Value:<span class="text-danger">*</span></label>
        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-pen-plus"></i></span>
                        </span>
            <?php echo Form::text('dropvalue', $value = null, ['id'=>'dropvalue','placeholder'=>'Enter Dropdown dropvalue','class'=>'form-control','required']); ?>

        </div>
        </div>
    </div>


</fieldset>


<div class="text-right">
    <button type="submit" class="btn bg-teal-400"><?php echo e($btnType); ?> <i class="icon-database-insert"></i></button>
</div>
<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Dropdown/Providers/../Resources/views/Dropdown/partial/action.blade.php ENDPATH**/ ?>