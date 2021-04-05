@extends('home::layouts.master')
@section('title')Services | Autopati @stop 
@section('content')

<section class="ecm-features home-tabs ecm-new pt-3 pb-3">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Available</span> Services</h1>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    @foreach($service_categories as $service_category)
                    <li class="nav-item">
                        <a class="nav-link @if($loop->first)active @endif" id="pills-one-tab" data-toggle="pill" href="#service-{{$service_category->id}}" role="tab" aria-controls="pills-one" aria-selected="true">{{$service_category->title}}</a>
                    </li>
                    @endforeach
                
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    @foreach($service_categories as $service_category)
                    <div class="tab-pane fade show @if($loop->first)active @endif" id="service-{{$service_category->id}}" role="tabpanel" aria-labelledby="pills-one-tab">
                        <div class="">
                            @inject('services', '\App\Modules\ServiceManagement\Repositories\ServiceManagementRepository')
                            @php
                                $services = $services->findAllActiveServiceCategory($limit=50,$service_category->id);
                            @endphp
                             <div class="row">
                            @forelse($services as $service)
                           
                            <div class="col-md-3">
                                <div class="services_item">
                                    <a href="{{route('service',$service->id)}}"><img src="{{($service->cover_image) ? asset($service->file_full_path).'/'.$service->cover_image : asset('admin/default.png' )}}" alt=""></a>
                                    <div class="services_item_desc">
                                        <h6><a href="{{route('service',$service->id)}}">{{$service->title}}</a></h6>
                                        <span><i class="fa fa-map-marker"></i> &nbsp; {{$service->location}}</span>
                                        {{-- <p class="mb-0">Aenean auctor wisi et urna. Aliquam erat volutpat. Duis ac turpis. Integer rutrum ante</p> --}}
                                    </div>
                                </div>
                            </div>
                            @empty
                            <div class="container" style="margin: 20px 20px;">
                                <h1 class="text-center">No Service Available ! </h1>
                            </div>
                            @endforelse
                             </div>
                        </div>
                    </div>
                    @endforeach
         
                </div>
            </div>
        </div>
    </div>
</section>

@endsection