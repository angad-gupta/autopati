<script src="{{ asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
<script src="{{ asset('admin/global/js/demo_pages/form_select2.js')}}"></script>

<fieldset class="mb-3">
    <legend class="text-uppercase font-size-sm font-weight-bold"></legend>
            
          

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                    <label class="col-form-label col-lg-3">Category:<span class="text-danger">*</span></label>
                    <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                        <div class="input-group">
                        {!! Form::select('category_id',$category, $value = null, ['placeholder'=>'-- Select Service Category --','id'=>'servicecategory_id','class'=>'brand_id form-control select-search',' data-fouc']) !!}
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Service Title:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-pen"></i>
                                    </span>
                                </span>
                                {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Enter Service Title','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="form-group row">
                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Location:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-location3"></i>
                                    </span>
                                </span>
                                {!! Form::text('location', $value = null, ['id'=>'location','placeholder'=>'Enter Location','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
                

                 <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Status:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-dots"></i>
                                    </span>
                                </span>
                               {!! Form::select('status',[ '1'=>'Enabled','2'=>'Disabled'], $value = null, ['id'=>'status','class'=>'form-control']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group row">

                <div class="col-lg-6">
                    <div class="row">
                        <label class="col-form-label col-lg-3">Cover Image:<span class="text-danger">*</span></label>
                        <div class="col-lg-9 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                <span class="input-group-prepend">
                                    <span class="input-group-text"><i class="icon-images3"></i></span>
                                </span>
                                {!! Form::file('cover_image', ['id'=>'cover_image','class'=>'form-control']) !!}
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
                                     $image = ($service_info->cover_image) ? asset($service_info->file_full_path).'/'.$service_info->cover_image : asset('admin/image.png');
                                @endphp

                                <img id="banner_image" src="{{$image}}" alt="your image" class="preview-image" style="height: 100px;width: auto;" />
                                @else
                                <img id="banner_image" src="{{ asset('admin/image.png') }}" alt="your image" class="preview-image" style="height: 100px; width: auto;" />
                                @endif
                                <br>
                                <br>
                                <span class="text-success font-weight-bold font-italic">Note :: The recommended dimensions is 800 X 500. </span>
                        </div>

                    </div>
                </div>
            </div>


            <div class="form-group row">
                <div class="col-lg-12">
                    <div class="row">
                        <label class="col-form-label col-lg-1">Description:<span class="text-danger">*</span></label>
                        <div class="col-lg-11 form-group-feedback form-group-feedback-right">
                            <div class="input-group">
                                {!! Form::textarea('description', null, ['id' => 'description','placeholder'=>'Enter Description Content', 'class' =>'form-control simple_textarea_description']) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</fieldset>


<div class="text-right">
    <button type="submit" class="ml-2 btn bg-pink-600 btn-labeled btn-labeled-left"><b><i class="icon-database-insert"></i></b> {{ $btnType }}</button>
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
                        <h4 class="text-purple">Cover Image Size is Greater Than 3Mb. Please Upload Below 3Mb.</h4>
                        <button type="button" class="btn btn-success" data-dismiss="modal">Thank You !!!</button>
                    </center>
                </div>
            </div>
        </div>
    </div>
<!-- /warning modal -->



{{-- <script type="text/javascript">
    
    $(document).ready(function(){
         $('#banner').bind('change', function() {
            var a=(this.files[0].size);

            if(a > 3000000) {
               $('#modal_image_size').modal('show');
               $('#banner').val('');
            };
        });
    });

</script> --}}

