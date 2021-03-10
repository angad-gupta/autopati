<script src="{{ asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>


    <div class="form-group row">
        <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Spec Title:<span class="text-danger">*</span></label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-hat"></i>
                            </span>
                        </span>
                        {!! Form::text('spec_title', $value = null, ['id'=>'spec_title','placeholder'=>'Enter Spec Title','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>

         <div class="col-lg-6">
            <div class="row">
                <label class="col-form-label col-lg-3">Automobile:</label>
                <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text"><i class="icon-dots"></i>
                            </span>
                        </span>
                       {!! Form::select('automobile',[ 'Car'=>'Car','Bike'=>'Bike','Both'=>'Both'], $value = null, ['id'=>'automobile','class'=>'form-control']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>