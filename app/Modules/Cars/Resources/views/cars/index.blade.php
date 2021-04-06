@extends('admin::layout')
@section('title')Cars @stop
@section('breadcrum')Cars @stop

@section('script')
<script src="{{asset('admin/global/js/plugins/tables/datatables/datatables.min.js')}}"></script>
<script src="{{asset('admin/global/js/plugins/forms/selects/select2.min.js')}}"></script>
@stop

@section('content')

 @include('cars::cars.partial.advance-search')
 
 <div class="card card-body">
    <div class="media align-items-center align-items-md-start flex-column flex-md-row">
        <a href="#" class="text-teal mr-md-3 align-self-md-center mb-3 mb-md-0">
            <i class="icon-car2 text-pink-400 border-pink-400 border-3 rounded-round p-2"></i>
        </a>

        <div class="media-body text-center text-md-left">
            <h6 class="media-title font-weight-semibold">List of Cars</h6>
            All Luxury, Branded and Upcoming Cars with its Specification will listed below. You can Modify its Features and Specification too.
        </div>
        
        <a href="{{route('cars.create')}}" class="btn bg-pink-600 btn-labeled btn-labeled-left" style="float: left"><b><i class="icon-add-to-list"></i></b> Create Cars</a>
    </div>
</div>


<div class="row">

    @inject('cars', '\App\Modules\Cars\Repositories\CarRepository')
     @if($cars_info->total() != 0)
        @foreach($cars_info as $key => $value)

        @php
         $total_color_car = $cars->countColor($value->id);
         $total_gallery = $cars->countgallery($value->id);
         $total_specification = $cars->countspecification($value->id);
         $total_features = $cars->countFeature($value->id);  
        @endphp


          
        <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card pb-card pb-card--approved card-body">
            <div class="d-flex justify-content-between align-items-center">
                @php 
                if($value){
                    $imagePath = asset($value->file_full_path).'/'.$value->car_image;
                }else{
                    $imagePath = asset('admin/vehicle.jpeg');
                }
                @endphp

                <h5 class="text-uppercase font-weight-semibold m-0"><i class="text-danger icon-car"></i>  {{ optional($value->BrandInfo)->brand_name }} :: {{ optional($value->ModelInfo)->model_name }} :: {{ optional($value->VariantInfo)->variant_name }}</h5>
                
                <div class="pb-card-status d-flex align-items-center"><img class="image-fluid rounded-round" src="{{ $imagePath}}" style="width: 60px; height: 60px; object-fit: cover; border: 1px solid #eeeeec"/> </div>
            </div>
            <span>{{$value->short_quote}}</span>
            <div class="d-flex justify-content-between align-items-center pt-1">
                <span>Starting Price: <strong class="pl-1">Rs. {{ number_to_words($value->starting_price) }} /-</strong></span>
            </div>
            <div class="row justify-content-between pt-3 pb-2">
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Available Color">
                        <i class="icon-droplet pb-1 text-danger"></i>
                        <span class="d-block">{{ $total_color_car ?? '' }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Image Gallery">
                        <i class="icon-image3 pb-1 text-warning"></i>
                        <span class="d-block">{{ $total_gallery ?? '' }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Specification Used">
                        <i class="icon-gallery pb-1 text-info"></i>
                        <span class="d-block">{{ $total_specification ?? '' }}</span>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Photo Features">
                        <i class="icon-thumbs-up3 pb-1 text-success"></i>
                        <span class="d-block">{{ $total_features ?? '' }}</span>
                    </div>
                </div>
            </div>


            <div class="btn-group align-items-center justify-content-between mt-3">
                <h6 class="m-0">(Expected) Launch Date: <strong class="pl-1">{{ date('jS M, Y',strtotime($value->expected_launch_date)) }}</strong></h6> 

                    <a href="{{route('cars.profile',['car_id'=>$value->id])}}" type="button" class="btn bg-success btn-labeled btn-labeled-right rounded-round"> Go To Profile<b><i class="icon-arrow-right7"></i></b></a>
  
            </div>
        </div>
    </div>
    @endforeach
    @else

    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card pb-card card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-uppercase font-weight-semibold m-0">No Cars Found !!!</h5>
            </div>
        </div>
    </div>
    @endif

    <div class="col-12">
        <span class="float-right pagination align-self-end mt-3">
             {{ $cars_info->links() }}
        </span>
    </div>

</div>


@endsection
