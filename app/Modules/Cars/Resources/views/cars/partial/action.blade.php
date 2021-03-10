<script src="{{ asset('admin/global/js/plugins/pickers/daterangepicker.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/picker_date.js')}}"></script>
<script src="{{ asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

    <div class="form-group row">

        <div class="col-lg-4">
            <div class="row">
             <label class="col-form-label col-lg-3">Brand:<span class="text-danger">*</span></label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                   {!! Form::select('brand_id',$brand, $value = null, ['placeholder'=>'-- Select Brand --','id'=>'brand_id','class'=>'brand_id form-control select-search',' data-fouc']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row">
               <label class="col-form-label col-lg-3">Model:<span class="text-danger">*</span></label>
               <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    {!! Form::select('model_id', [''=>'-- Select Model --'],null,['id'=>'model_id','class'=>'form-control select-search']) !!}
                </div>
               </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row">
               <label class="col-form-label col-lg-3">Variant:<span class="text-danger">*</span></label>
               <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    {!! Form::select('variant_id', [''=>'-- Select Variant --'],null,['id'=>'variant_id','class'=>'form-control select-search']) !!}
                </div>
               </div>
            </div>
        </div>

    </div>

    <div class="form-group row">

    <div class="col-lg-6">
        <div class="row">
            <label class="col-form-label col-lg-3">Car Image:</label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-images3"></i></span>
                    </span>
                    {!! Form::file('car_image', ['id'=>'car_image','class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    </div>

     <div class="col-lg-6">
        <div class="row">
             <label class="col-form-label col-lg-3"></label>
            <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                @if($is_edit)
                    @php
                         $image = ($brand_info->car_image) ? asset($brand_info->file_full_path).'/'.$brand_info->car_image : asset('admin/image.png');
                    @endphp

                    <img id="car_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                    @else
                    <img id="car_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                    @endif
            </div>

        </div>
    </div>
</div>

    <div class="form-group row">

         <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Short Quote:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-pencil6"></i></span>
                    </span>
                    {!! Form::text('short_quote', $value = null, ['id'=>'short_quote','placeholder'=>'Enter Short Quote','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Short Content:<span class="text-danger">*</span></label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-pencil6"></i></span>
                    </span>
                    {!! Form::text('short_content', $value = null, ['id'=>'short_content','placeholder'=>'Enter Short Content','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>

    <div class="form-group row">
        <div class="col-lg-12">
            <div class="row">
                <label class="col-form-label col-lg-2">Description:</label>
                <div class="col-lg-10 form-group-feedback form-group-feedback-right">
                    <div class="input-group">
                        {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description', 'class' =>'form-control textarea_description']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row">

         <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Year of Manufacture:<span class="text-danger">*</span></label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-pencil6"></i></span>
                    </span>
                    {!! Form::text('year_of_manufacture', $value = null, ['id'=>'year_of_manufacture','placeholder'=>'Enter Year of Manufacture','class'=>'numeric form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Starting Price:<span class="text-danger">*</span></label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-coins"></i></span>
                    </span>
                    {!! Form::text('starting_price', $value = null, ['id'=>'starting_price','placeholder'=>'Enter Starting Price','class'=>'numeric form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>

     @php
        $clauch = (($is_edit) AND $blockVal->is_launch == '1') ? 'style=display:block;' : 'style=display:none;';
    @endphp

    <div class="form-group row">

         <div class="col-lg-4">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Launch ?:<span class="text-danger">*</span></label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                     {!! Form::select('is_launch',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_launch','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-4 currently_launch" {{$clauch}}>
            <div class="row">
             <label class="col-form-label col-lg-3">Currently Launch ?:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                    {!! Form::select('currently_launch',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'currently_launch','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="row">
             <label class="col-form-label col-lg-3 expected_launch">Launch Date:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-calendar3"></i></span>
                    </span>
                    {!! Form::text('expected_launch_date', $value = null, ['id'=>'expected_launch_date','class'=>'daterange-single form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>


 @php
        $discount = (($is_edit) AND $blockVal->is_offer_available == '1') ? 'style=display:block;' : 'style=display:none;';
@endphp

    <div class="form-group row">

         <div class="col-lg-4">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Offer Available ?:<span class="text-danger">*</span></label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                     {!! Form::select('is_offer_available',[ '1'=>'Yes','2'=>'No'], $value = null, ['placeholder'=>'--Select Any --','id'=>'is_offer_available','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-4 offer_discount" {{$discount}}>
            <div class="row">
             <label class="col-form-label col-lg-3">Discount(%):</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-coins"></i></span>
                    </span>
                    {!! Form::text('discount_percent', $value = null, ['id'=>'discount_percent','placeholder'=>'Enter Starting Price','class'=>'numeric form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-4 offer_discount" {{$discount}}>
            <div class="row">
             <label class="col-form-label col-lg-3">Flat Amount:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-coins"></i></span>
                    </span>
                    {!! Form::text('flat_amount', $value = null, ['id'=>'flat_amount','placeholder'=>'Enter Flat Amount','class'=>'numeric form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>

</fieldset>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold">Homepage Features</legend>


    <div class="form-group row">

         <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Luxury ?:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                    {!! Form::select('is_luxury',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_luxury','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Deal Of The Month ?:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                    {!! Form::select('is_deal_of_the_month',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_deal_of_the_month','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>

    <div class="form-group row">

         <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Popular ?:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                    {!! Form::select('is_popular',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_popular','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Electric ?:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                    {!! Form::select('is_electric',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_electric','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>

    <div class="form-group row">

         <div class="col-lg-6">
            <div class="row">
             <label class="col-form-label col-lg-3">Is Top Car ?:</label>
             <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                <div class="input-group">
                    <span class="input-group-prepend">
                        <span class="input-group-text"><i class="icon-dots"></i></span>
                    </span>
                    {!! Form::select('is_top_car',[ '1'=>'Yes','2'=>'No'], $value = null, ['id'=>'is_top_car','class'=>'form-control']) !!}
                </div>
             </div>
            </div>
        </div>

    </div>

</fieldset>

<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
</div>


<script type="text/javascript">
    $(document).ready(function(){

        $('#is_launch').on('change',function(){
            var is_launch = $(this).val();

            if(is_launch == '1'){
                $('.currently_launch').show();
                $('.expected_launch').html('Launch Date:');
            }else{
                $('.currently_launch').hide();
                $('.expected_launch').html('Expected Launch Date:');
            }
        });

        $('#is_offer_available').on('change',function(){
            var is_offer_available = $(this).val();

            if(is_offer_available == '1'){
                $('.offer_discount').show();
            }else{
                $('.offer_discount').hide();
            }
        });

        $('#brand_id').on('change',function(){
            var brand_id = $(this).val();
            var token = $("input[name='_token']").val();
          
              $.ajax({
                  url: "<?php echo route('append-model-ajax') ?>",
                  method: 'POST',
                  data: {brand_id:brand_id, _token:token},
                  success: function(data) {
                     $("select[name='model_id'").html('');
                     $("select[name='model_id'").html(data.options);
                  }
              });
        });

        $('#model_id').on('change',function(){
            var model_id = $(this).val();
            var token = $("input[name='_token']").val();
          
              $.ajax({
                  url: "<?php echo route('append-variant-ajax') ?>",
                  method: 'POST',
                  data: {model_id:model_id, _token:token},
                  success: function(data) {
                     $("select[name='variant_id'").html('');
                     $("select[name='variant_id'").html(data.options);
                  }
              });
        });


    });
</script>