@extends('admin::layout')
@section('title')Spec @stop 
@section('breadcrum')Update Spec @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<script src="{{ asset('admin/validation/spec.js')}}"></script>

<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header header-elements-inline">
        <h5 class="card-title">Edit Spec</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::model($spec_info,['method'=>'PUT','route'=>['spec.update',$spec_info->id],'class'=>'form-horizontal','id'=>'spec_submit','role'=>'form','files'=>true]) !!} 
        	
        	@include('spec::spec.partial.action',['btnType'=>'Update']) 
        
        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop