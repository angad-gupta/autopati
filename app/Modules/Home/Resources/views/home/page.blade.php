@extends('home::layouts.master')
@section('title'){{$page_content->title}} | Autopati @stop 
@section('content')



<section class="ecm-features ecm-new pb-0">
    @php 
        if($page_content->image){
            $imagePath = asset($page_content->file_full_path).'/'.$page_content->image;
        }else{
            $imagePath = asset('admin/vehicle.jpeg');
        }
    @endphp
    <div class="page-banner">
        <img src="{{$imagePath}}" alt="">
    </div>
    <div class="compare-wrap">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="ecm-features__title d-flex align-items-center justify-content-between">
                        <h1><span>{!! $page_content->short_content !!} </span></h1>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mt-3">
                    <p>{!! $page_content->description !!}</p>
                </div>
            </div>
        </div>
    </div>

</section>
@endsection