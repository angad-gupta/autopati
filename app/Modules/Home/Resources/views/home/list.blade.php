@extends('home::layouts.master')
@section('title')List | Autopati @stop 
@section('content')


<section class="ecm-features ecm-new pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1>Search For :<span> {{$title}}</span></h1>
                    <h1><span style="color: #e53012">{{count($vehicles)}} </span> Found !</h1>
                  
                </div>
            </div>
        </div>

        @if($vehicles->isNotEmpty())
        <div class="row mt-3 mb-3">
            @foreach($vehicles as $vehicle)
            <div class="col-md-3">
                <div class="services_item">
                    <img src="{{($vehicle->car_image) ? asset($vehicle->file_full_path).'/'.$vehicle->car_image : asset('admin/default.png')}}" alt="">
                    <div class="services_item_desc">
                        <h6><a href="{{route('car.detail',$vehicle->id)}}">{{optional($vehicle->BrandInfo)->brand_name }} {{ optional($vehicle->ModelInfo)->model_name }}</a></h6>
                        <p class="mb-0">Starting Rs {{$vehicle->starting_price}}</p>
                        <div class="d-flex justify-content-end">
                            <a href="{{route('car.detail',$vehicle->id)}}" class="btn btn-outline-warning">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <div class="container" style="margin: 20px 20px;">
            <h1 class="text-center">No Vehicle Found ! </h1>
        </div>
        @endif
       

        <span >
            @if($vehicles->total() != 0)
                {{ $vehicles->links() }}
            @endif
        </span>
    </div>
</section>

@endsection