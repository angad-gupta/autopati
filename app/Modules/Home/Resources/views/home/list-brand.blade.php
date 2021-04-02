@extends('home::layouts.master')
@section('title')Brands | Autopati @stop 
@section('content')

<section class="ecm-features ecm-new pb-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>{{$type}}</span> brands</h1>
                  
                </div>
            </div>
        </div>
        <div class="row mt-3 mb-3">
            
            @foreach($brands as $brand)
            <div class="col-md-2">
                <a href="{{route('list.brand.vehicles',$brand->id)}}" class="brand-item">
                    <img src="{{($brand->brand_logo) ? asset($brand->file_full_path).'/'.$brand->brand_logo : asset('admin/default.png')}}" alt="{{$brand->brand_name}}">
                    <h5>{{$brand->brand_name}}</h5>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection