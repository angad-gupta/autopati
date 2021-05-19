
<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-3">News Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-hat"></i>
                                    </span>
                                </span>
                                <?php echo Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Enter News Title','class'=>'form-control']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-3">News Sub Content:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <?php echo Form::textarea('sub_content', null, ['id' => 'sub_content','placeholder'=>'Enter News Sub Content', 'class' =>'form-control simple_textarea_description']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-3">News Content:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <?php echo Form::textarea('content', null, ['id' => 'content','placeholder'=>'Enter News Content', 'class' =>'form-control textarea_description']); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">News Image:</label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                <?php echo Form::file('news_image', ['id'=>'news_image','class'=>'form-control']); ?>

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

            </div>

            <div class="form-group row">

                 <div class="col-lg-6">
                    <div class="row">
                         <label class="col-form-label col-lg-3"></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <?php if($is_edit): ?>
                                <?php
                                     $image = ($news_info->news_image) ? asset($news_info->file_full_path).'/'.$news_info->news_image : asset('admin/image.png');
                                ?>

                                <img id="news_image" src="<?php echo e($image); ?>" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                <?php else: ?>
                                <img id="news_image" src="<?php echo e(asset('admin/image.png')); ?>" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                <?php endif; ?>
                                <br>
                                <br>
                                <!-- <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 800 X 500. </span> -->
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
                        <h4 class="text-purple">News Image Size is Greater Than 3Mb. Please Upload Below 3Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



<script type="text/javascript">
    
    $(document).ready(function(){
         $('#blog_image').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 3000000) {
               $('#modal_image_size').modal('show');
               $('#blog_image').val('');
            };
        });

    });

</script>

<?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/News/Resources/views/news/partial/action.blade.php ENDPATH**/ ?>