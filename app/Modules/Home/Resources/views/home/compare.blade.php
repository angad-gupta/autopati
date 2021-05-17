@extends('home::layouts.master')
@section('title')Compare | Autopati @stop
@section('breadcrumb') Compare @stop
@section('content')


    <div class="page-banner">
        <img src="https://stimg.cardekho.com/pwa/img/bgimg/compare-cars.jpg" alt="">
    </div>

    @include('home::home.partial.breadcrumb')

    <div class="compare-page">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="compare-block">
                        <div class="row">
                            <div class="col-12">
                                <h5>Compare Cars</h5>
                            </div>
                        </div>

                        <form action="{{route('compare.vehicles')}}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-3 offset-3">
                                    <div class="compare_item">
                                        <div class="compare_icon">
                                            <svg width="60" height="60" fill="#999" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.998 48.998"><path d="M48.302 15.614h-5.198a.69.69 0 00-.51.233L38.8 9.67a.48.48 0 00-.073-.09c-.861-.864-2.494-1.54-3.715-1.54h-.867V6.048h-2.231V8.04h-14.83V6.048h-2.232V8.04h-.611c-1.221 0-2.855.672-3.722 1.529a.483.483 0 00-.069.085l-4.005 6.253a.674.674 0 00-.553-.293H.693a.693.693 0 00-.693.693v2.771c0 .384.309.694.693.694h3.026c-1.75 1.694-2.893 4.79-2.893 7.043v6.791c0 1.334.391 2.568 1.045 3.578v3.078c0 1.479 1.181 2.688 2.633 2.688h3.21c1.452 0 2.633-1.205 2.633-2.688v-.509H38.65v.509c0 1.479 1.183 2.688 2.633 2.688h3.213c1.452 0 2.632-1.205 2.632-2.688v-3.078a6.554 6.554 0 001.045-3.578v-6.791c0-2.254-1.144-5.349-2.896-7.042h3.027a.693.693 0 00.693-.693v-2.772a.693.693 0 00-.695-.694zM12.28 11.262c.607-.436 1.527-.755 2.004-.755h20.774c.506 0 1.377.34 1.832.696l4.491 7.339H7.624l4.656-7.28zm21.561 14.676v4.93h-1.426v-4.93h1.426zm-2.466 0v4.93h-1.426v-4.93h1.426zm-2.467 0v4.93h-1.426v-4.93h1.426zm-2.465 0v4.93h-1.426v-4.93h1.426zm-2.464 0v4.93h-1.426v-4.93h1.426zm-2.466 0v4.93h-1.427v-4.93h1.427zm-2.468 0v4.93H17.62v-4.93h1.425zm-2.465 0v4.93h-1.426v-4.93h1.426zM6.744 36.696c-4.192-1.432-2.158-4.229-2.158-4.229h4.992l3.328 4.229H6.744zm6.66-5.825H3.868v-4.933h9.535l.001 4.933zm18.326 5.825H17.265c-1.497 0-2.712-1.344-2.712-3h19.89c0 1.658-1.214 3-2.713 3zm10.521 0h-6.164l3.328-4.229h4.993c0 .002 2.033 2.798-2.157 4.229zm2.876-5.825h-9.531v-4.933h9.531v4.933z"/></svg>
                                        </div>
                                        <div class="compare_dd mt-3">
                                            <div class="col-lg-12 form-group-feedback form-group-feedback-right mb-3">
                                                <div class="input-group">
                                                    {!! Form::select('first_brand_id',$brand, $value = null, ['placeholder'=>'-- Select Brand --','id'=>'first_brand_id','class'=>'brand_id form-control select-search',' data-fouc']) !!}
                                                </div>
                                            </div>

                                            <div class="col-lg-12 form-group-feedback form-group-feedback-right mb-3">
                                                <div class="input-group">
                                                    {!! Form::select('first_model_id', [''=>'-- Select Model --'],null,['id'=>'first_model_id','class'=>'form-control select-search']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                                <div class="input-group">
                                                    {!! Form::select('first_variant_id', [''=>'-- Select Variant --'],null,['id'=>'first_variant_id','class'=>'form-control select-search']) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="compare_item">
                                        <div class="compare_icon">
                                            <svg width="60" height="60" fill="#999" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48.998 48.998"><path d="M48.302 15.614h-5.198a.69.69 0 00-.51.233L38.8 9.67a.48.48 0 00-.073-.09c-.861-.864-2.494-1.54-3.715-1.54h-.867V6.048h-2.231V8.04h-14.83V6.048h-2.232V8.04h-.611c-1.221 0-2.855.672-3.722 1.529a.483.483 0 00-.069.085l-4.005 6.253a.674.674 0 00-.553-.293H.693a.693.693 0 00-.693.693v2.771c0 .384.309.694.693.694h3.026c-1.75 1.694-2.893 4.79-2.893 7.043v6.791c0 1.334.391 2.568 1.045 3.578v3.078c0 1.479 1.181 2.688 2.633 2.688h3.21c1.452 0 2.633-1.205 2.633-2.688v-.509H38.65v.509c0 1.479 1.183 2.688 2.633 2.688h3.213c1.452 0 2.632-1.205 2.632-2.688v-3.078a6.554 6.554 0 001.045-3.578v-6.791c0-2.254-1.144-5.349-2.896-7.042h3.027a.693.693 0 00.693-.693v-2.772a.693.693 0 00-.695-.694zM12.28 11.262c.607-.436 1.527-.755 2.004-.755h20.774c.506 0 1.377.34 1.832.696l4.491 7.339H7.624l4.656-7.28zm21.561 14.676v4.93h-1.426v-4.93h1.426zm-2.466 0v4.93h-1.426v-4.93h1.426zm-2.467 0v4.93h-1.426v-4.93h1.426zm-2.465 0v4.93h-1.426v-4.93h1.426zm-2.464 0v4.93h-1.426v-4.93h1.426zm-2.466 0v4.93h-1.427v-4.93h1.427zm-2.468 0v4.93H17.62v-4.93h1.425zm-2.465 0v4.93h-1.426v-4.93h1.426zM6.744 36.696c-4.192-1.432-2.158-4.229-2.158-4.229h4.992l3.328 4.229H6.744zm6.66-5.825H3.868v-4.933h9.535l.001 4.933zm18.326 5.825H17.265c-1.497 0-2.712-1.344-2.712-3h19.89c0 1.658-1.214 3-2.713 3zm10.521 0h-6.164l3.328-4.229h4.993c0 .002 2.033 2.798-2.157 4.229zm2.876-5.825h-9.531v-4.933h9.531v4.933z"/></svg>
                                        </div>
                                        <div class="compare_dd mt-3">
                                            <div class="col-lg-12 form-group-feedback form-group-feedback-right mb-3">
                                                <div class="input-group">
                                                    {!! Form::select('second_brand_id',$brand, $value = null, ['placeholder'=>'-- Select Brand --','id'=>'second_brand_id','class'=>'brand_id form-control select-search',' data-fouc']) !!}
                                                </div>
                                            </div>

                                            <div class="col-lg-12 form-group-feedback form-group-feedback-right mb-3">
                                                <div class="input-group">
                                                    {!! Form::select('second_model_id', [''=>'-- Select Model --'],null,['id'=>'second_model_id','class'=>'form-control select-search']) !!}
                                                </div>
                                            </div>
                                            <div class="col-lg-12 form-group-feedback form-group-feedback-right">
                                                <div class="input-group">
                                                    {!! Form::select('second_variant_id', [''=>'-- Select Variant --'],null,['id'=>'second_variant_id','class'=>'form-control select-search']) !!}
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row text-center">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary mt-4">Compare Cars</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $('#first_brand_id').on('change',function(){
                var brand_id = $(this).val();
                var token = $("input[name='_token']").val();

                $.ajax({
                    url: "<?php echo route('home-append-model-ajax') ?>",
                    method: 'POST',
                    data: {brand_id:brand_id, _token:token},
                    success: function(data) {
                        $("select[name='first_model_id'").html('');
                        $("select[name='first_model_id'").html(data.options);
                    }
                });
            });

            $('#first_model_id').on('change',function(){
                var model_id = $(this).val();
                var token = $("input[name='_token']").val();

                $.ajax({
                    url: "<?php echo route('home-append-variant-ajax') ?>",
                    method: 'POST',
                    data: {model_id:model_id, _token:token},
                    success: function(data) {
                        $("select[name='first_variant_id'").html('');
                        $("select[name='first_variant_id'").html(data.options);
                    }
                });
            });

            $('#second_brand_id').on('change',function(){
                var brand_id = $(this).val();
                var token = $("input[name='_token']").val();

                $.ajax({
                    url: "<?php echo route('home-append-model-ajax') ?>",
                    method: 'POST',
                    data: {brand_id:brand_id, _token:token},
                    success: function(data) {
                        $("select[name='second_model_id'").html('');
                        $("select[name='second_model_id'").html(data.options);
                    }
                });
            });

            $('#second_model_id').on('change',function(){
                var model_id = $(this).val();
                var token = $("input[name='_token']").val();

                $.ajax({
                    url: "<?php echo route('home-append-variant-ajax') ?>",
                    method: 'POST',
                    data: {model_id:model_id, _token:token},
                    success: function(data) {
                        $("select[name='second_variant_id'").html('');
                        $("select[name='second_variant_id'").html(data.options);
                    }
                });
            });
        });

    </script>


@endsection