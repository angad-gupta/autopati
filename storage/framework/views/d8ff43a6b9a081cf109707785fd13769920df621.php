<script src="<?php echo e(asset('admin/global/js/demo_pages/form_tags_input.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/global/js/plugins/forms/tags/tokenfield.min.js')); ?>"></script>

<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>

     <a href="<?php echo e(route('configuration.index')); ?>" class="fab-menu-btn btn bg-danger btn-float rounded-round btn-icon"><i class="icon-arrow-left15" data-popup="tooltip" data-placement="bottom" data-original-title="Back To Configuration"></i></a>

 </li>
</ul>
<!-- /top right menu -->

<div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
    <fieldset class="mb-1">
        <legend class="text-uppercase font-size-sm text-danger font-weight-black"># Block Section</legend>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Spec Title:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-grid5"></i>
                                        </span>
                                    </span>
                                    <?php echo Form::text('spec_title', $value = $spec->spec_title, ['disabled','class'=>'form-control']); ?>


                                    <?php echo Form::hidden('spec_id',$spec_id); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Spec Feature Title:<span class="text-danger">*</span></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                        </span>
                                    </span>
                                   <?php echo Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Enter Spec Feature Title','class'=>'form-control','required']); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
    </fieldset>
</div>

<div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
    <fieldset class="mb-1">
        <legend class="text-uppercase font-size-sm text-danger font-weight-black">Features Value</legend>


                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="row">
                            <label class="col-form-label col-lg-2">Features Value<span class="text-danger">*</span>:<small>(press <span class="badge badge-secondary">tab</span> after every Value)</small></label>
                            <div class="col-lg-10 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                        </span>
                                    </span>
                                  <?php echo e(Form::text('config_value', null, ['class' => 'form-control tokenfield-teal', 'placeholder' => 'value', 'data-fouc'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
    </fieldset>
</div>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> <?php echo e($btnType); ?></button>
</div><?php /**PATH /Users/angadgupta/Desktop/Bidhee/Autopati/autopati/app/Modules/Configuration/Resources/views/configuration/partial/action.blade.php ENDPATH**/ ?>