<div class="card card-body">
    <?php echo Form::open(['route' => 'vehiclemodel.index', 'method' => 'get']); ?>

    <div class="row">
 
         <div class="col-md-3">
            <label class="d-block font-weight-semibold">Brand Name:</label>
            <div class="input-group">
                <?php echo Form::select('brand_id[]', $brand_name, request('site_assigned') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

            </div>
        </div>

         <div class="col-md-3">
            <label class="d-block font-weight-semibold">Model Name:</label>
            <div class="input-group">
                <?php echo Form::select('model_name[]', $model_name, request('site_assigned') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']); ?>

            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-2">
        <button class="btn bg-primary" type="submit">
            Search Now
        </button>
        <a href="<?php echo e(route('vehiclemodel.index')); ?>" data-popup="tooltip" data-placement="top" data-original-title="Refresh Search" class="btn bg-danger ml-2">
            <i class="icon-spinner9"></i>
        </a>
    </div>
    <?php echo Form::close(); ?>

</div>


<?php /**PATH E:\xampp\htdocs\05-10 Autopati\autopati\app/Modules/VehicleModel\Resources/views/vehiclemodel/partial/search.blade.php ENDPATH**/ ?>