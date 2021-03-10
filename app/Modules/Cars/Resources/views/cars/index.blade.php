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


     @if($cars_info->total() != 0)
        @foreach($cars_info as $key => $value)
          
        <div class="col-md-12 col-lg-6 col-xl-4">
        <div class="card pb-card pb-card--approved card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="text-uppercase font-weight-semibold m-0">{{ optional($value->BrandInfo)->brand_name }} :: {{ optional($value->ModelInfo)->model_name }} :: {{ optional($value->VariantInfo)->variant_name }}</h5>
                <div class="pb-card-status d-flex align-items-center"><i class="text-danger icon-car"></i></div>
            </div>
            <span>{{$value->short_quote}}</span>
            <div class="d-flex justify-content-between align-items-center pt-1">
                <span>Starting Price: <strong class="pl-1">Rs. {{ number_format($value->starting_price) }}/-</strong></span>
            </div>
            <div class="row justify-content-between pt-3 pb-2">
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Order By HO">
                        <i class="icon-file-text pb-1 text-danger"></i>
                        <span class="d-block">0</span>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Order Site">
                        <i class="icon-hour-glass2 pb-1 text-warning"></i>
                        <span class="d-block">0</span>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Sent From HO ">
                        <i class="icon-file-check pb-1 text-info"></i>
                        <span class="d-block">0</span>
                    </div>
                </div>
                <div class="col-lg-6 col-xl-3">
                    <div class="bd-square-block" data-popup="tooltip" title="" data-placement="top" data-original-title="Daily Consumption">
                        <i class="icon-thumbs-up3 pb-1 text-success"></i>
                        <span class="d-block">0</span>
                    </div>
                </div>
            </div>

            <div class="smb-1s">
                <div class="d-flex justify-content-end w-100">
                    <a href="#collapse-link-{{$key}}" class="font-weight-semibold text-muted" data-toggle="collapse">
                        See More <i class="icon-chevron-down"></i>
                    </a>
                </div>
                <div class="collapse" id="collapse-link-{{$key}}">
                    <ul class="list-unstyled mb-0 pt-2">
                        <li class="mb-3">
                            <div class="d-flex align-items-center mb-1">Contractor Involved <span class="text-muted ml-auto">0</span></div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-orange-600" style="width: 0%">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </li>
                        <li class="mb-3">
                            <div class="d-flex align-items-center mb-1">Material Used <span class="text-muted ml-auto">0</span></div>
                            <div class="progress" style="height: 5px;">
                                <div class="progress-bar bg-success-600" style="width: 0%">
                                    <span class="sr-only"></span>
                                </div>
                            </div>
                        </li>
                    </ul>
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
