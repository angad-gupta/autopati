@extends('home::layouts.master')
@section('title')Compare Detail| Autopati @stop 
@section('breadcrumb') Compare Detail @stop
@section('content')

@php
    $empty_vehicle = '- Not Vehicle Found -';
    $empty_description = '- No Description Found -';
    $empty_feature = '- No Feature Found -';
    $empty_photo = '- No Photo Found -';
@endphp

<div class="compare-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="compare-block">
                    <div class="row">
                        <div class="col-12">
                            <h5 class="mb-4">
                                @if(isset($first_vehicle))
                                    {{optional($first_vehicle->BrandInfo)->brand_name }} {{ optional($first_vehicle->ModelInfo)->model_name }} {{ optional($first_vehicle->VariantInfo)->variant_name }} 
                                @else
                                    {{$empty_vehicle}}
                                @endif

                                vs 

                                @if(isset($second_vehicle))
                                    {{optional($second_vehicle->BrandInfo)->brand_name }} {{ optional($second_vehicle->ModelInfo)->model_name }} {{ optional($second_vehicle->VariantInfo)->variant_name }}</h5>
                                @else
                                    {{$empty_vehicle}}
                                @endif
                        </div>
                    </div>
                    <div class="row">
                    
                        @if(isset($first_vehicle))
                        <div class="col-md-3 d-flex offset-3">
                            <div class="compare_vehicles">
                                <img src="{{$first_vehicle->car_image ? asset($first_vehicle->file_full_path).'/'.$first_vehicle->car_image : asset('admin/vehicle.jpeg')}}" alt="">
                                <div class="services_item_desc">
                                    <h6><a href="{{route('car.detail',$first_vehicle->id)}}">{{optional($first_vehicle->BrandInfo)->brand_name }} {{ optional($first_vehicle->ModelInfo)->model_name }} {{ optional($first_vehicle->VariantInfo)->variant_name }}</a></h6>
                                    <h6>Rs.{{$first_vehicle->starting_price}}</h6>
                                    <span>Avg. Ex-Showroom price</span>
                                    <a href="#" class="btn btn-primary btn-sm">Get Offers</a>
                                </div>
                            </div>
                        </div>
                        @else
                            {{$empty_vehicle}}
                        @endif
                        
                        @if(isset($second_vehicle))
                        <div class="col-md-3 d-flex">
                            <div class="compare_vehicles">
                                <img src="{{$second_vehicle->car_image ? asset($second_vehicle->file_full_path).'/'.$second_vehicle->car_image : asset('admin/vehicle.jpeg')}}" alt="">
                                <div class="services_item_desc">
                                    <h6><a href="{{route('car.detail',$second_vehicle->id)}}">{{optional($second_vehicle->BrandInfo)->brand_name }} {{ optional($second_vehicle->ModelInfo)->model_name }} {{ optional($second_vehicle->VariantInfo)->variant_name }}</a></h6>
                                    <h6>Rs.{{$second_vehicle->starting_price}}</h6>
                                    <span>Avg. Ex-Showroom price</span>
                                    <a href="#" class="btn btn-primary btn-sm">Get Offers</a>
                                </div>
                            </div>
                        </div>
                        @else
                            {{$empty_vehicle}}
                        @endif
         
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="compare-wrap">
    <div class="container">
        <div class="row">
                <h3>Compare for 
                    @if(isset($first_vehicle))
                    {{optional($first_vehicle->BrandInfo)->brand_name }} {{ optional($first_vehicle->ModelInfo)->model_name }} {{ optional($first_vehicle->VariantInfo)->variant_name }} 
                    @else
                        {{$empty_vehicle}}
                    @endif

                    vs 

                    @if(isset($second_vehicle))
                        {{optional($second_vehicle->BrandInfo)->brand_name }} {{ optional($second_vehicle->ModelInfo)->model_name }} {{ optional($second_vehicle->VariantInfo)->variant_name }}</h5>
                    @else
                        {{$empty_vehicle}}
                    @endif
                </h3>
                <div class="col-md-6">
                    <p>
                        @if(isset($second_vehicle))
                        {!! $first_vehicle->description !!}
                        @else
                        {{$empty_description}}
                        @endif
                    </p>
                </div>
                <div class="col-md-6">
                    <p>
                        @if(isset($second_vehicle))
                        {!! $second_vehicle->description !!}
                        @else
                        {{$empty_description}}
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>

 
<div class="compare-info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                    <h4 class="mb-4"><span>Technical Specification :</span> 
                        @if(isset($first_vehicle))
                        {{optional($first_vehicle->BrandInfo)->brand_name }} {{ optional($first_vehicle->ModelInfo)->model_name }} {{ optional($first_vehicle->VariantInfo)->variant_name }} 
                        @else
                            {{$empty_vehicle}}
                        @endif

                        vs 

                        @if(isset($second_vehicle))
                            {{optional($second_vehicle->BrandInfo)->brand_name }} {{ optional($second_vehicle->ModelInfo)->model_name }} {{ optional($second_vehicle->VariantInfo)->variant_name }}</h5>
                        @else
                            {{$empty_vehicle}}
                        @endif

                <div class="page-accordian">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                     
                        @inject('configuration', '\App\Modules\Configuration\Repositories\ConfigurationRepository')
                        @foreach($vehicle_spec as $key => $spec_val)
                            @php
                            $features = $configuration->findAllBySpecId($spec_val->id);
                            @endphp

                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        @if($features->isNotEmpty())
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#spec-{{$spec_val->id}}" aria-expanded="false" aria-controls="collapseTwo">
                                            {{$spec_val->spec_title}}
                                        </a>
                                        @endif
                        
                                    </h4>
                                </div>
                                <div id="spec-{{$spec_val->id}}" class="panel-collapse collapse @if($loop->first)collapse show @endif role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                               
                                                @inject('carSpecification', '\App\Modules\Cars\Repositories\CarRepository')
                                                @foreach($features as $key => $spec_val)
                                                <tr>
                                                    <th scope="row" style="font-size:1rem;">{{$spec_val->title}}</th>
                                                    <td style="font-size:1rem;font-size: 1rem;font-weight: 400;line-height: 1.5;">
                                                        @if(isset($first_vehicle))
                                                            @php
                                                                $first_vehicle_features = $carSpecification->getFeaturesByCarId($first_vehicle->id,$spec_val->id,$spec_val->id);
                                                            @endphp
                                                            @foreach($first_vehicle_features as $key => $first_vehicle_feature_val)
                                                                {{optional($first_vehicle_feature_val->confFeatureInfo)->config_value}} 
                                                            @endforeach
                                                        @else
                                                            {{$empty_feature}}
                                                        @endif
                                                    </td>
                                                    <td style="font-size:1rem;font-size: 1rem;font-weight: 400;line-height: 1.5;">
                                                        @if(isset($second_vehicle))
                                                            @php
                                                                $second_vehicle_features = $carSpecification->getFeaturesByCarId($second_vehicle->id,$spec_val->id,$spec_val->id);
                                                            @endphp
                                                            @foreach($second_vehicle_features as $key => $second_vehicle_feature_val)
                                                                {{optional($second_vehicle_feature_val->confFeatureInfo)->config_value}} 
                                                            @endforeach
                                                        @else
                                                            {{$empty_feature}}
                                                        @endif
                                                        
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

{{-- <div class="compare-info">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="page-accordian">
                    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingOne">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Technical Specifications
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne" class="panel-collapse collapse in show" role="tabpanel" aria-labelledby="headingOne">
                                <div class="panel-body">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">Daihatsu Sigra</th>
                                            <th scope="col">Toyota Calya</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">Engine</th>
                                            <td>1997 cc, 4 Cylinders Inline, 4 Valves/Cylinder, DOHC</td>
                                            <td>1498 cc, 4 Cylinders Inline, 4 Valves/Cylinder, DOHC</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Engine Type	</th>
                                            <td>2.0L I4 mStallion 150 TGDi	</td>
                                            <td>1.5 H4K	</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fuel Type</th>
                                            <td>Petrol</td>
                                            <td>Petrol</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Max Power (bhp@rpm)	</th>
                                            <td>150 bhp @ 5000 rpm</td>
                                            <td>105 bhp @ 5600 rpm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Max Torque (Nm@rpm)</th>
                                            <td>300 Nm @ 1250 rpm</td>
                                            <td>142 Nm @ 4000 rpm</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Mileage (ARAI) (kmpl)</th>
                                            <td>-</td>
                                            <td>14.19</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Driving Range (Km)</th>
                                            <td>-</td>
                                            <td>825</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Drivetrain</th>
                                            <td>4WD / AWD</td>
                                            <td>FWD</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Transmission</th>
                                            <td>Manual - 6 Gears</td>
                                            <td>Manual - 5 Gears</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Emission Standard</th>
                                            <td>BS6</td>
                                            <td>BS6</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        Dimensions & Weight
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                                <div class="panel-body">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Length (mm)</th>
                                            <td>3985</td>
                                            <td>4360</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Width (mm)</th>
                                            <td>1820</td>
                                            <td>1822</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="headingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        Capacity
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                <div class="panel-body">
                                    <table class="table">
                                        <tbody>
                                        <tr>
                                            <th>Length (mm)</th>
                                            <td>3985</td>
                                            <td>4360</td>
                                        </tr>
                                        <tr>
                                            <th>Width (mm)</th>
                                            <td>1820</td>
                                            <td>1822</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}



<div class="compare-image">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4 class="mb-4">Photo Comparison</h4>
            </div>

            @if(isset($first_vehicle))
            <div class="col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($first_vehicle_photo_gallery as $keynav => $valuenav)
                        <a class="nav-link @if($loop->first) active @endif" id="v-pills-home-tab" data-toggle="pill" href="#firsttab-{{$keynav+1}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $valuenav->gallery_title }}</a>
                    @endforeach
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="tab-content" id="v-pills-tabContent">
                        @foreach($first_vehicle_photo_gallery as $key1 => $value1)
                          
                            <div class="tab-pane fade @if($loop->first)show active @endif" id="firsttab-{{$key1 + 1}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            @if(!$value1->galleryDetail->isEmpty())
                                            @foreach($value1->galleryDetail as $keyone => $galleryone)
                                            
                                                @php
                                                    $ipath1 = asset($galleryone->file_full_path).'/'.$galleryone->car_image_path;
                                                @endphp

                                            <div class="col-md-12">
                                                <div class="compare-image__item">
                                                    <a href="{{ $ipath1 }}" target="_blank"><img src="{{ $ipath1 }}"></a>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                                <p>No Gallery Images Added</p>>
                                            @endif
                                        </div>
                                </div>
                      
                                </div>
                            </div>
                          
                        @endforeach

                </div>
 
             </div>

             @else
             <div class="col-md-6">
                {{$empty_photo}}
             </div>
            @endif


            @if(isset($second_vehicle))
             <div class="col-md-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    @foreach($second_vehicle_photo_gallery as $keynav => $valuenav)
                        <a class="nav-link @if($loop->first) active @endif" id="v-pills-home-tab" data-toggle="pill" href="#secondtab-{{$keynav+1}}" role="tab" aria-controls="v-pills-home" aria-selected="true">{{ $valuenav->gallery_title }}</a>
                    @endforeach
                    
                </div>
            </div>

            <div class="col-md-4">
                <div class="tab-content" id="v-pills-tabContent">
                        @foreach($second_vehicle_photo_gallery as $key2 => $value2)
                          
                            <div class="tab-pane fade @if($loop->first)show active @endif" id="secondtab-{{$key2 + 1}}" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                <div class="row">
                                <div class="col-md-12">
                                        <div class="row">
                                            @if(!$value2->galleryDetail->isEmpty())
                                            @foreach($value2->galleryDetail as $keytwo => $gallerytwo)
                                            
                                                @php
                                                    $ipath2 = asset($gallerytwo->file_full_path).'/'.$gallerytwo->car_image_path;
                                                @endphp

                                            <div class="col-md-12">
                                                <div class="compare-image__item">
                                                    <a href="{{ $ipath2 }}" target="_blank"><img src="{{ $ipath2 }}"></a>
                                                </div>
                                            </div>
                                            @endforeach
                                            @else
                                                <p>No Gallery Images Added</p>>
                                            @endif
                                        </div>
                                </div>
                                </div>
                            </div>
                          
                        @endforeach

                </div>
 
             </div>
             @else
             <div class="col-md-6">
                {{$empty_photo}}
             </div>
            @endif

        </div>
    </div>
</div>






@endsection