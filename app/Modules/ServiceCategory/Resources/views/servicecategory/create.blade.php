@extends('admin::layout')
@section('title')Service Category @stop 
@section('breadcrum')Create Service Category @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{asset('admin/validation/brand.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Create Service Category </h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'servicecategory.store','method'=>'POST','id'=>'servicecategory_submit','class'=>'form-horizontal','role'=>'form']) !!}
         	@include('servicecategory::servicecategory.partial.action',['btnType'=>'Save']) 
         {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop