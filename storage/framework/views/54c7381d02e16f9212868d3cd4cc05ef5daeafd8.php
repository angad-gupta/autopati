<script src="<?php echo e(asset('admin/global/js/plugins/forms/selects/bootstrap_multiselect.js')); ?>"></script>
<script src="<?php echo e(asset('admin/global/js/demo_pages/form_multiselect.js')); ?>"></script>

 
    <div class="card card border-light-600 bg-light">
        <div class="bg-purple-400 card-header header-elements-inline border-bottom-0">
            <h5 class="card-title text-uppercase font-weight-semibold">Advance Filter</h5>
        </div>

        <div class="card-body">
        <?php echo Form::open(['route' => ['cars.index'], 'method' => 'get']); ?>

        <div class="row">

            <div class="col-md-3">
                <label class="d-block font-weight-semibold">Brand:</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="text-blue icon-toggle"></i>
                        </span>
                    </span>
                    <?php
                        $brand = (array_key_exists('brand_id',$search_value)) ? $search_value['brand_id'] : '';
                    ?>
                    <?php echo Form::select('brand_id[]', $brand_name, $brand, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

                </div>
            </div>

            <div class="col-md-3">
                <label class="d-block font-weight-semibold">Model:</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="text-blue icon-toggle"></i>
                        </span>
                    </span>
                    <?php
                        $model = (array_key_exists('model_id',$search_value)) ? $search_value['model_id'] : '';
                    ?>
                    <?php echo Form::select('model_id[]', $model_name, $model, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

                </div>
            </div>

                        <div class="col-md-3">
                <label class="d-block font-weight-semibold">Variant:</label>
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="text-blue icon-toggle"></i>
                        </span>
                    </span>
                    <?php
                        $variant = (array_key_exists('variant_id',$search_value)) ? $search_value['variant_id'] : '';
                    ?>
                    <?php echo Form::select('variant_id[]', $variant_name, $variant, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

                </div>
            </div>

        </div>

        <div class="d-flex justify-content-end mt-2">
            <button class="btn bg-success-600 btn-labeled btn-labeled-left" type="submit">
                <b><i class="icon-pen-plus"></i></b>Search Now
            </button>
            <a href="<?php echo e(route('cars.index')); ?>" data-popup="tooltip" data-placement="top" data-original-title="Refresh Search" class="btn bg-danger ml-2">
                <i class="icon-spinner9"></i>
            </a>
        </div>

        <?php echo Form::close(); ?>

        </div>
</div>

<?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/Cars\Resources/views/cars/partial/advance-search.blade.php ENDPATH**/ ?>