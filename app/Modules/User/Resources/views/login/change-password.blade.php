@extends('admin::layout')
@section('title')Change Password @stop
@section('breadcrum')Change Password @stop

@section('script')
    <!-- Theme JS files -->
    <script src="{{asset('admin/global/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script src="{{asset('admin/global/js/demo_pages/form_inputs.js')}}"></script>
    <!-- /theme JS files -->

@stop @section('content')

    <!-- Form inputs -->
    <div class="card">
        <div class="card-header bg-teal-400 header-elements-inline">
            <h5 class="card-title">Change Password</h5>
            <div class="header-elements">

            </div>
        </div>

        <div class="card-body">

            @include('flash::message')

            {!! Form::open(['route'=>'update-password','method'=>'POST','class'=>'form-horizontal','role'=>'form','files' => true]) !!}

            <fieldset class="mb-3">
                <legend class="text-uppercase font-size-sm font-weight-bold"></legend>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">Old Password:</label>
                    <div class="col-lg-10">
                        {!! Form::text('old_password', $value = null, ['id'=>'old_password','placeholder'=>'Old Password','class'=>'form-control']) !!}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-form-label col-lg-2">New Password:</label>
                    <div class="col-lg-10">
                        {!! Form::password('password', ['id'=>'password','placeholder'=>'New Password','class'=>'form-control']) !!}
                    </div>
                </div>


            </fieldset>

            <div class="text-right">
                <button type="submit" class="btn bg-teal-400">Update Password <i class="icon-paperplane ml-2"></i></button>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
    <!-- /form inputs -->

@stop