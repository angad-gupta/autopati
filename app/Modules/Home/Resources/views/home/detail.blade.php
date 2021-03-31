@extends('home::layouts.master')
@section('title')Detail | Autopati @stop 
@section('breadcrumb'){{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }} @stop
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
                            
                            </div>
                        </div>
                        <div class="col-md-6 d-flex">
                            <div class="mt-auto mb-auto ml-auto mr-auto">
                                <h3 class="text-center" style="color: #e53012"><q>{{$car->short_quote}}</q></h3>
                                <h6 class="text-center" style="color: gray;">{{$car->short_content}} </h6>

                                @php
                                    $current_date = Carbon\Carbon::now()->format('Y-m-d');
                                @endphp

                                @if($car->expected_launch_date >= $current_date)
                                <h6 class="text-center" style="color: # e53012"><span style="color: gray">Expected Launch Date :</span> {{date('d M Y ',strtotime($car->expected_launch_date)) }}</h6>
                                @endif
                            </div>
                        </div>
                     
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="compare-wrap">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3> {{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }}</h3>
                <p>{!! $car->description !!}
                </p>
            </div>
        </div>
    </div>
</div>

@if(sizeof($photo_gallery)>0)
          
<div class="compare-image">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Photo</h4>
            </div>
    
           
            <div class="col-md-3">
                
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($photo_gallery as $key => $value)
                        <a class="nav-link @if($loop->first) active @endif" id="v-pills-home-tab" data-toggle="pill" href="#v{{$value->id}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $value->gallery_title }}</a>
                    @endforeach
                </div>
            </div>
       
            <div class="col-md-8">
                
                <div class="tab-content" id="v-pills-tabContent">
                    @foreach($photo_gallery as $key => $value)
                    <div class="tab-pane fade show @if($loop->first) active @endif" id="v{{$value->id}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <div class="row">
                            @if(!$value->galleryDetail->isEmpty())
                            @foreach($value->galleryDetail as $key => $gallery)
                                @php
                                    $file_icon = asset('admin/image.png');
                                    $ipath = asset($gallery->file_full_path).'/'.$gallery->car_image_path;
                                @endphp
                               
                                <div class="col-md-6">
                                    <div class="compare-image__item">
                                        <a href="{{ $ipath }}" target="_blank"><img src="{{ $ipath }}"></a>
                                        {{-- <h6>Sigra rims</h6> --}}
                                        {{-- <a href="">More Images <i class="fa fa-angle-double-right"></i></a> --}}
                                    </div>
                                </div>
                                @endforeach
                                @else
                                    <p>No Gallery Images Added</p>>
                                @endif
                         
                        </div>
                    </div>
                    @endforeach
                </div>
            
            </div>
        
         
        </div>
    </div>
</div>
@endif


<div class="compare-info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <h4 class="mb-4"><span>Technical Specification :</span> {{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }}</h4>
                <div class="page-accordian">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      
                        @inject('configuration', '\App\Modules\Configuration\Repositories\ConfigurationRepository')
                        @foreach($car_spec as $key => $spec_val)
                            @php
                            $features = $configuration->findAllBySpecId($spec_val->id);
                            @endphp
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#spec-{{$spec_val->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$spec_val->spec_title}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="spec-{{$spec_val->id}}" class="panel-collapse collapse @if($loop->first)collapse show @endif role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                                @inject('carSpecification', '\App\Modules\Cars\Repositories\CarRepository')
                                                @foreach($features as $key => $spec_val)
                                                @php
                                                $carFeatures = $carSpecification->getFeaturesByCarId($car->id,$spec_val->id,$spec_val->id);
                                                @endphp
                                          
                                            <tr>
                                                <th scope="row">{{$spec_val->title}}</th>
                                                <td>
                                                @foreach($carFeatures as $key => $car_feat_val)
                                                    {{optional($car_feat_val->confFeatureInfo)->config_value}} 
                                                @endforeach
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                        
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                  
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


{{-- <section class="ecm-features home-tabs ecm-new bg-grey pt-4 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Similar</span> Cars</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>

   
      <div class="col-12">
  
        <div class="row">
            
            @inject('similarcars', '\App\Modules\Cars\Repositories\CarRepository')
            @php
                $brand_id = optional($car->BrandInfo)->id;
                $model_id = optional($car->ModelInfo)->id;
                $variant_id = optional($car->VariantInfo)->id;
                $similar_cars = $similarcars->findSimilarCar($brand_id,$model_id,$variant_id );
              
            @endphp
            @foreach($similar_cars as $similar_car)
        
            <div class="col-4">
                <div class="">
                    <div class="item">
                        <a href="{{route('car-detail',$similar_car->id)}}" class="c-vehicles">
                            <div class="services_item">
                                @php 
                                if($similar_car->car_image){
                                    $imagePath = asset($similar_car->file_full_path).'/'.$similar_car->car_image;
                                }else{
                                    $imagePath = asset('admin/vehicle.jpeg');
                                }
                             
                                @endphp
                                <img src="{{$imagePath}}" alt="">
                                <div class="services_item_desc">
                                    <span>{{optional($similar_car->BrandInfo)->brand_name }} </span>
                                    <h6>{{ optional($similar_car->ModelInfo)->model_name }} {{ optional($similar_car->VariantInfo)->variant_name }} </h6>
              
                                    <h5>Rs.{{$similar_car->starting_price}}</h5>
                                </div>
                            </div>
                        </a>
                    </div>
              
                </div>
            </div>
            @endforeach
        </div>
        
      </div>
    </div>

</section> --}}

@inject('similarcars', '\App\Modules\Cars\Repositories\CarRepository')
@php
    $brand_id = optional($car->BrandInfo)->id;
    $model_id = optional($car->ModelInfo)->id;
    $variant_id = optional($car->VariantInfo)->id;
    $similar_cars = $similarcars->findSimilarCar($limit=12,$brand_id,$model_id,$variant_id,$car->id);
  
@endphp
@if($similar_cars->isNotEmpty())
<section class="ecm-features home-tabs ecm-new bg-grey pt-4 pb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Similar</span> Cars</h1>
                    <a href="product-list.php" class="see-all text-right">View all <i class="fa fa-angle-right"></i></a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                
                <div class="owl-carousel owl-theme new-arrival">
                    @foreach($similar_cars as $similar_car)
                    @php 
                    if($similar_car->car_image){
                        $imagePath = asset($similar_car->file_full_path).'/'.$similar_car->car_image;
                    }else{
                        $imagePath = asset('admin/vehicle.jpeg');
                    }
                    @endphp

                    <div class="item">
                        <a href="{{route('car.detail',$similar_car->id)}}" class="services_item_desc" style="color: black;">
                            <img src="{{$imagePath}}" alt="" height="200">
                            <span>{{optional($similar_car->BrandInfo)->brand_name }} </span>
                            <h6>{{ optional($similar_car->ModelInfo)->model_name }} {{ optional($similar_car->VariantInfo)->variant_name }} </h6>
      
                            <h5>Rs.{{$similar_car->starting_price}}</h5>
                        </a>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@endsection