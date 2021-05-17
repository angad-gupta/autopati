<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_select2.js')); ?>"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Banner Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                <?php echo Form::text('banner_title', $value = null, ['id'=>'banner_title','placeholder'=>'Enter Banner Title','class'=>'form-control']); ?>

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


            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Short Content:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-quill2"></i>
                                    </span>
                                </span>
                                <?php echo Form::text('short_content', $value = null, ['id'=>'short_content','placeholder'=>'Enter Short Content','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Add To Luxury ?:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                               <?php echo Form::select('add_to_luxury',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'add_to_luxury','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Banner Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                <?php echo Form::file('banner_image', ['id'=>'banner_image','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>

                 <div class="col-lg-6">
                    <div class="row">
                         <label class="col-form-label col-lg-3"></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <?php if($is_edit): ?>
                                <?php
                                     $image = ($banner_info->banner_image) ? asset($banner_info->file_full_path).'/'.$banner_info->banner_image : asset('admin/default.png');
                                ?>

                                <img id="banner_image" src="<?php echo e($image); ?>" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                <?php else: ?>
                                <img id="banner_image" src="<?php echo e(asset('admin/default.png')); ?>" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                <?php endif; ?>
                                <br>
                                <br>
                                <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 800 X 500. </span>
                        </div>

                    </div>
                </div>
            </div>


            <div class="form-group row">
 
                <div class="col-lg-6" >
                    <div class="row">
                        <label class="col-form-label col-lg-3">Banner URL:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                                <?php echo Form::text('banner_link', $value = null, ['id'=>'banner_link','placeholder'=>'Enter External Link','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> <?php echo e($btnType); ?></button>
</div>



 <!-- Warning modal -->
    <div id="modal_image_size" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                 <div class="modal-body">
                    <center>
                        <i class="icon-alert text-warning icon-3x"></i>
                    </center>
                    <br>
                    <center>
                        <h4 class="text-purple">Banner Image Size is Greater Than 3Mb. Please Upload Below 3Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#banner').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 3000000) {
               $('#modal_image_size').modal('show');
               $('#banner').val('');
            };
        });
    });

</script>

<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Banner/Resources/views/banner/partial/action.blade.php ENDPATH**/ ?>