@extends('admin::layout')
@section('title')Model @stop 
@section('breadcrum')Update Model @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/vehiclemodel.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Model</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($model_info,['method'=>'PUT','route'=>['vehiclemodel.update',$model_info->id],'class'=>'form-horizontal','id'=>'vehiclemodel_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('vehiclemodel::vehiclemodel.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop