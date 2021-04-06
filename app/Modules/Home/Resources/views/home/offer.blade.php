@extends('home::layouts.master')
@section('title')Offer | Autopati @stop 
@section('content')

<div class="compare-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="compare-block">
                    <div class="row">
                        <div class="col-12">
                            <div style="display: flex; justify-content : space-between;">
                            <h5 class="mb-4" >{{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }} </h5>
                            <h5 class="mb-4" style="color: #e53012"><i class="fa fa-eye" style=""></i>  {{$car->views}}</h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @php 
                        if($car->car_image){
                            $imagePath = asset($car->file_full_path).'/'.$car->car_image;
                        }else{
                            $imagePath = asset('admin/vehicle.jpeg');
                        }
                     
                        @endphp
            
                        <div class="col-md-6 d-flex" >
                            <div class="">
                                <img src="{{$imagePath}}" alt="" style="width: 100%">
                                <h2 class="text-center" style="color:#e53012 " >Rs. {{number_to_words($car->starting_price)}} </h2>
                            </div>
                        </div>
                        <div class="col-md-6 mt-auto mb-auto">
                            <h1 style="color:#e53012 " >CURRENT OFFER !</h1>
                            @if($car->discount_percent != null)
                            <div class="pricing-table-body">
                                <h4 style="color:#e53012 " >Discount Percentage</h4>
                                <h1 class="pricing-table-price text-success" ><span>{{$car->discount_percent}}</span>%</h1>
                                <ul class="list-unstyled content-group">
                                    <li><strong>Discount Amount : </strong> <span class="text-success">Rs. {{number_to_words($car->discount_amount)}}</span></li>
                                </ul>
                            </div>
                            <hr>
                            @endif
                            @if($car->flat_amount != null)
                            <div class="pricing-table-body">
                                <h4 style="color:#e53012 " >Flat Discount</h4>
                                <h1 class="pricing-table-price text-success"><span>Rs. {{number_to_words($car->flat_amount)}}</span></h1>
                                
                            </div>
                            @endif
                            
                            @php
                            $current_date = Carbon\Carbon::now()->format('Y-m-d');
                            @endphp

                            @if($car->expected_launch_date >= $current_date)
                            <h6 class="text-left" style="color: # e53012"><span style="color: gray">Expected Launch Date :</span> {{date('d M Y ',strtotime($car->expected_launch_date)) }}</h6>
                            @endif
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection