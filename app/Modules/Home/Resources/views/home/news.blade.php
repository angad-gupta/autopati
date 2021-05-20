@extends('home::layouts.master')
@section('title')News | Autopati @stop
@section('content')

    <section class="ecm-features ecm-new page-title p-0">
        @php
            if($news->news_image){
                $imagePath = asset($news->file_full_path).'/'.$news->news_image;
            }else{
                $imagePath = asset('admin/vehicle.jpeg');
            }
        @endphp

        <div class="page-banner">
            <img src="{{$imagePath}}" alt="">
        </div>
    </section>

    <div class="compare-wrap section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12">
                    <div class="ecm-features__title d-flex align-items-center justify-content-between">
                        <h1><span>{{ $news->title }} </span></h1>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-3">
                    <p>{!! $news->sub_content !!}</p>
                    <p>{!! $news->content !!}</p>
                </div>
            </div>
        </div>
    </div>

@endsection