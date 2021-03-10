@extends('admin::layout')
@section('title')Add Dropdown Field @stop
@section('breadcrum')Add Dropdown Field @stop

@section('script')
<!-- Theme JS files -->
<script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
<script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
<!-- /theme JS files -->

@stop @section('content')

<!-- Form inputs -->
<div class="card">
    <div class="card-header bg-teal-400 header-elements-inline">
        <h5 class="card-title">Create Dropdown Field</h5>
        <div class="header-elements">

        </div>
    </div>

    <div class="card-body">

        {!! Form::open(['route'=>'dropdown.storeField','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

        <fieldset class="mb-3">
            <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

            <div class="form-group row">
                <label class="col-form-label col-lg-2">Dropdown Field :<span class="text-danger">*</span></label>
                <div class="col-lg-10">
                    {!! Form::text('title', $value = null, ['id'=>'title','placeholder'=>'Enter Dropdown Title','class'=>'form-control','required']) !!}
                </div>
            </div>


        </fieldset>


        <div class="text-right">
            <button type="submit" class="btn bg-teal-400">Create<i class="icon-database-insert"></i></button>
        </div>


        {!! Form::close() !!}
    </div>
</div>
<!-- /form inputs -->

@stop
