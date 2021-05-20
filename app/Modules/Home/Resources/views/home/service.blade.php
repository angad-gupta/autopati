@extends('home::layouts.master')
@section('title'){{ $service->title }} | Service | Autopati @stop
@section('content')

    <section class="ecm-features page-title ecm-new p-0">
        @php
            if($service->cover_image){
                $imagePath = asset($service->file_full_path).'/'.$service->cover_image;
            }else{
                $imagePath = asset('admin/vehicle.jpeg');
            }
        @endphp

        <div class="page-banner">
            <img src="{{$imagePath}}" alt="">
        </div>

        <div class="compare-wrap section-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-sm-12">
                        <div class="ecm-features__title d-flex align-items-center justify-content-between">
                            <h1><span>{{ $service->title }} </span></h1>
                            <h6><span><i class="fa fa-map-marker"></i> {{ $service->location }} </span></h6>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 mt-3">
                        <p>{!! $service->description !!}</p>
                    </div>
                </div>
            </div>
        </div>

    </section>

@endsection