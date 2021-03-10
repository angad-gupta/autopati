<div class="card card-body">
    {!! Form::open(['route' => 'vehiclemodel.index', 'method' => 'get']) !!}
    <div class="row">
 
         <div class="col-md-3">
            <label class="d-block font-weight-semibold">Brand Name:</label>
            <div class="input-group">
                {!! Form::select('brand_id[]', $brand_name, request('site_assigned') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
            </div>
        </div>

         <div class="col-md-3">
            <label class="d-block font-weight-semibold">Model Name:</label>
            <div class="input-group">
                {!! Form::select('model_name[]', $model_name, request('site_assigned') ?? null, ['class'=>'form-control multiselect-filtering', 'multiple']) !!}
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-end mt-2">
        <button class="btn bg-primary" type="submit">
            Search Now
        </button>
        <a href="{{ route('vehiclemodel.index') }}" data-popup="tooltip" data-placement="top" data-original-title="Refresh Search" class="btn bg-danger ml-2">
            <i class="icon-spinner9"></i>
        </a>
    </div>
    {!! Form::close() !!}
</div>


