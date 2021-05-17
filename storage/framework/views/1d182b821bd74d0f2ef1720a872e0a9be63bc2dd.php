<script src="<?php echo e(asset('admin/global/js/demo_pages/form_tags_input.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('admin/global/js/plugins/forms/tags/tokenfield.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/select2.min.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_select2.js')); ?>"></script>

<!-- Top right menu -->
<ul class="fab-menu fab-menu-absolute fab-menu-top-right" data-fab-toggle="hover" id="fab-menu-affixed-demo-right">
    <li>

     <a href="<?php echo e(route('vehiclemodel.index')); ?>" class="fab-menu-btn btn bg-danger btn-float rounded-round btn-icon"><i class="icon-arrow-left15" data-popup="tooltip" data-placement="bottom" data-original-title="Back To Model"></i></a>

 </li>
</ul>
<!-- /top right menu -->

<div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
    <fieldset class="mb-1">
        <legend class="text-uppercase font-size-sm text-danger font-weight-black"># Brand Section</legend>


                <div class="row">
                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Select Brand:</label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                     <?php echo Form::select('brand_id',$brand, $value = null, ['id'=>'brand_id','class'=>'brand_id form-control select-search',' data-fouc']); ?>


                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="row">
                            <label class="col-form-label col-lg-3">Model Title:<span class="text-danger">*</span></label>
                            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                        </span>
                                    </span>
                                   <?php echo Form::text('model_name', $value = null, ['id'=>'model_name','placeholder'=>'Enter Model Title','class'=>'form-control','required']); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
    </fieldset>
</div>

<div class="card card-body" style="border: dashed;border-radius: 25px;border-width: thin;">
    <fieldset class="mb-1">
        <legend class="text-uppercase font-size-sm text-danger font-weight-black">Brand Model Variant</legend>


                <div class="row">

                    <div class="col-lg-12 ">
                        <div class="row">
                            <label class="col-form-label col-lg-2">Variant Value<span class="text-danger">*</span>:<small>(press <span class="badge badge-secondary">tab</span> after every Value)</small></label>
                            <div class="col-lg-10 form-group-feedback form-group-feedback-right">
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text"><i class="icon-puzzle4"></i>
                                        </span>
                                    </span>
                                  <?php echo e(Form::text('variant_name', null, ['class' => 'form-control tokenfield-teal', 'placeholder' => 'value', 'data-fouc'])); ?>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                
    </fieldset>
</div>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> <?php echo e($btnType); ?></button>
</div><?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/VehicleModel\Resources/views/vehiclemodel/partial/action.blade.php ENDPATH**/ ?>