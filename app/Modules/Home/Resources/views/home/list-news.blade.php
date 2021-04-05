@extends('home::layouts.master')
@section('title')News | Autopati @stop 
@section('content')

<section class="ecm-features pt-0">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="ecm-features__title d-flex align-items-center justify-content-between">
                    <h1><span>Latest</span> News/Blogs</h1>
                   
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($news as $new)
            <div class="col-md-3">
                <a href="{{route('news',$new->id)}}" class="ecm-luxury__item">
                    <span class="ecm-luxury__img">
                        @php 
                        if($new->news_image){
                            $imagePath = asset($new->file_full_path).'/'.$new->news_image;
                        }else{
                            $imagePath = asset('admin/vehicle.jpeg');
                        }
                    @endphp
                        <img src="{{$imagePath}}" alt="">
                    </span>
                    <div class="ecm-luxury__desc">
                        <span><i class="fa fa-calendar"></i> &nbsp;{{$new->date}}</span>
                        <h5>{{$new->title}}</h5>
                        <p>{!! \Illuminate\Support\Str::limit($new->content,40)!!}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</section>

@endsection
