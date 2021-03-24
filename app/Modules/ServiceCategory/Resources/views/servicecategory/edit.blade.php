@extends('admin::layout')
@section('title')Service Category @stop 
@section('breadcrum')Update Service Category @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/brand.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Service Category</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($servicecategory_info,['method'=>'PUT','route'=>['servicecategory.update',$servicecategory_info->id],'class'=>'form-horizontal','id'=>'servicecategory_submit','role'=>'form']) !!} 
        	
        	@include('servicecategory::servicecategory.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop