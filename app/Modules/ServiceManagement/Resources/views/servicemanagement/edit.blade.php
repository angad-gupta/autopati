@extends('admin::layout')
@section('title')Service Management @stop 
@section('breadcrum')Update Service @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/banner.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Service</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($service_info,['method'=>'PUT','route'=>['servicemanagement.update',$service_info->id],'class'=>'form-horizontal','id'=>'service_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('servicemanagement::servicemanagement.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop