<fieldset class="mb-1">
    <legend class="text-uppercase font-size-sm font-weight-bold">CRM Color Setting</legend>

            <div class="form-group row">

                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-form-label col-lg-6">Top Header Bar Color:</label>
                        <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-eyedropper2"></i>
                                    </span>
                                </span>
                                <?php if($is_edit): ?>
                                    <?php echo Form::text('main_navbar_color', $setting->main_navbar_color, ['id'=>'main_navbar_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']); ?>

                                <?php else: ?>
                                    <?php echo Form::text('main_navbar_color', $value = null, ['id'=>'main_navbar_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']); ?>

                                <?php endif; ?> 
                            </div>
                        </div>
                    </div>
                </div>
               <div class="col-lg-4">
                    <div class="row">
                        <label class="col-form-label col-lg-6">Sidebar Color:</label>
                        <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-eyedropper2"></i></span>
                                </span>
                                 <?php if($is_edit): ?>
                                    <?php echo Form::text('secondary_navbar_color', $setting->secondary_navbar_color , ['id'=>'secondary_navbar_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']); ?>

                                <?php else: ?>
                                    <?php echo Form::text('secondary_navbar_color', $value = null, ['id'=>'secondary_navbar_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']); ?>

                               <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="row">
                        <label class="col-form-label col-lg-6">Below Header Bar Color:</label>
                        <div class="col-lg-6 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-eyedropper2"></i></span>
                                </span>
                                    <?php if($is_edit): ?>
                                        <?php echo Form::text('page_header_color', $setting->page_header_color , ['id'=>'page_header_color','class'=>'form-control     colorpicker-show-input','data-preferred-format'=>'hex']); ?>

                                    <?php else: ?>
                                        <?php echo Form::text('page_header_color', $value = null, ['id'=>'page_header_color','class'=>'form-control colorpicker-show-input','data-preferred-format'=>'hex']); ?>

                                    <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

</fieldset>
<?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app\Modules\Setting\Providers/../Resources/views/setting/partial/color.blade.php ENDPATH**/ ?>