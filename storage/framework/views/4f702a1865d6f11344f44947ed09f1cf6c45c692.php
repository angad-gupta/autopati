
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pencil"></i>
                                    </span>
                                </span>
                                 <?php if($is_edit): ?>

                                    <?php echo Form::text('title', $value = null, ['id'=>'title','class'=>'form-control','readonly']); ?>

                                  
                                  <?php else: ?>

                                    <?php echo Form::select('title',['About Us'=>'About Us','Terms of Use'=>'Terms of Use','Privacy Policy'=>'Privacy Policy', 'Disclaimer'=>'Disclaimer' ], $value = null, ['id'=>'title','class'=>'form-control' ]); ?>    

                                  <?php endif; ?>    
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                <?php echo Form::file('image', ['id'=>'image','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

             <div class="form-group row">

                  <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Short Content:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <?php echo Form::textarea('short_content', $value = null, ['placeholder'=>'Enter Short Content','class'=>'form-control simple_textarea_description']); ?>

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
                                     $image = ($page->image) ? asset($page->file_full_path).'/'.$page->image : asset('admin/image.png');
                                ?>

                                <img id="image" src="<?php echo e($image); ?>" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                <?php else: ?>
                                <img id="image" src="<?php echo e(asset('admin/image.png')); ?>" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                <?php endif; ?>
                        </div>

                    </div>
                </div>
        </div>


    <div class="row">
        <div class="col-md-12">
            <div class="form-group row">

                    <div class="col-lg-12">
                        <h5>Page Description</h5>
                        <div class="input-group">
                       
                                <?php echo Form::textarea('description', $value = null, ['placeholder'=>'Enter Description','class'=>'form-control textarea_description']); ?>


                        </div>
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
                        <span class="input-group-text"><i class="icon-pencil"></i>
                        </span>
                    </span>
                   <?php echo Form::select('status',[ '1'=>'Enabled','2'=>'Disabled'], $value = null, ['id'=>'status','class'=>'form-control']); ?>

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
                        <h4 class="text-purple">Image Size is Greater Than 2Mb. Please Upload Below 2Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 2000000) {
               $('#modal_image_size').modal('show');
               $('#image').val('');
            };
        });

    });

</script>

<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Page/Providers/../Resources/views/page/partial/action.blade.php ENDPATH**/ ?>