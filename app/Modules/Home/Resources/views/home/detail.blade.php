@extends('home::layouts.master')
@section('title'){{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }} | Detail | Autopati @stop
@section('breadcrumb'){{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }} @stop
@section('content')

    @include('home::home.partial.breadcrumb')

    {{-- Product Details --}}
    <div class="section-padding">
        <div class="container">
            <div class="product-full">
                <?php
                if($car->car_image){
                    $imagePath = asset($car->file_full_path).'/'.$car->car_image;
                }else{
                    $imagePath = asset('admin/vehicle.jpeg');
                }
                ?>

                <figure class="product-media">
                    <img src="<?php echo e($imagePath); ?>" alt="">
                </figure>

                <div class="product-excerpt">
                    <div class="product-views">
                        <i class="fa fa-eye" style=""></i>  <?php echo e($car->views); ?>
                    </div>

                    <h1 class="product-title" >
                        <?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?>
                    </h1>

                    <div class="product-quote">
                        <?php echo e($car->short_quote); ?>
                    </div>

                    <div class="product-launch-date">
                        <?php
                        $current_date = Carbon\Carbon::now()->format('Y-m-d');
                        ?>

                        <?php if($car->expected_launch_date >= $current_date): ?>
                        <span>Expected Launch Date :</span> <?php echo e(date('d M Y ',strtotime($car->expected_launch_date))); ?>
                        <?php endif; ?>
                    </div>

                    <div class="product-content">
                        <?php echo e($car->short_content); ?>
                    </div>

                    <div class="product-price" >
                        Rs. <?php echo e(number_to_words($car->starting_price)); ?>
                    </div>

                    <?php if($car->is_offer_available == 1): ?>
                    <div class="product-action-bar">
                        <h4 class="text-center"><a href="<?php echo e(route('car.offer',$car->id)); ?>" class="btn btn-primary btn-sm ">Get Offers</a></h4>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- Product color varient --}}
    <div class="section-padding">
        <div class="container">
            <div class="viewer">
                <div class="viewer-control">
                    <div class="block-title">
                        <h3>
                            Choose you vehicle colors
                        </h3>
                    </div>

                    <div class="swatch swatch_color-picker">
                        <div class="swatch-option color">
                            <input type="radio" id="colorName1" name="Address" checked>

                            <label for="colorName1" data-toggle="tooltip" data-placement="top" title="Red" style="background: red">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName2" name="Address">

                            <label for="colorName2" data-toggle="tooltip" data-placement="top" title="Yellow" style="background: yellow">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName3" name="Address">

                            <label for="colorName3" data-toggle="tooltip" data-placement="top" title="White" style="background: white">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName4" name="Address">

                            <label for="colorName4" data-toggle="tooltip" data-placement="top" title="Pink" style="background: pink">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName5" name="Address">

                            <label for="colorName5" data-toggle="tooltip" data-placement="top" title="Black" style="background: black">
                            </label>
                        </div>
                        <div class="swatch-option color">
                            <input type="radio" id="colorName6" name="Address">

                            <label for="colorName6" data-toggle="tooltip" data-placement="top" title="Purple" style="background: purple">
                            </label>
                        </div>
                    </div>
                </div>

                <div class="viewer-display">
                    <figure>
                        <img src="/home/img/2.png" alt="">
                    </figure>
                </div>
            </div>
        </div>
    </div>

    {{-- Product view --}}
    <div class="section-padding">
        <div class="container">
            <div class="product-view">
                <div class="product-view--display">
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                            <div class="owl-carousel owl-theme nav-inside carousel_product-view">
                                {{-- Product view image size 1270/680px--}}
                                <div class="item">
                                    <img src="/home/img/f1.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f2.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f3.jpg" alt="Car name">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                            <div class="owl-carousel owl-theme nav-inside carousel_product-view">
                                {{-- Product view image size 1270/680px--}}
                                <div class="item">
                                    <img src="/home/img/f1.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f2.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f3.jpg" alt="Car name">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="owl-carousel owl-theme nav-inside carousel_product-view">
                                {{-- Product view image size 1270/680px--}}
                                <div class="item">
                                    <img src="/home/img/f1.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f2.jpg" alt="Car name">
                                </div>
                                <div class="item">
                                    <img src="/home/img/f3.jpg" alt="Car name">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-view--control">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">
                                Front
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">
                                Side
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">
                                Rear
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{-- Product description --}}
        <div class="section-padding">
            <div class="container">
                <div class="product-description">
                    <div class="product-information">
                        <div class="block-title">
                            <h3>
                                <?php echo e(optional($car->BrandInfo)->brand_name); ?> <?php echo e(optional($car->ModelInfo)->model_name); ?> <?php echo e(optional($car->VariantInfo)->variant_name); ?>
                            </h3>
                        </div>

                        <p><?php echo $car->description; ?>

                        </p>
                    </div>

                    <div></div>
                </div>
            </div>
        </div>

        {{-- Product technical specification --}}
        <div class="section-padding">
            <div class="container">
                <div class="block-product-specification">
                    <div class="block-title">
                        <h3>
                            <span>Technical Specification :</span>
                            <!-- Product name redundant -->
                        <?php /*echo e(optional($car->BrandInfo)->brand_name); */?><!-- <?php /*echo e(optional($car->ModelInfo)->model_name); */?> --><?php /*echo e(optional($car->VariantInfo)->variant_name); */?>
                        </h3>
                    </div>

                    <div class="page-accordian">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php $configuration = app('\App\Modules\Configuration\Repositories\ConfigurationRepository'); ?>
                            <?php $__currentLoopData = $car_spec; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                            <?php
                            $features = $configuration->findAllBySpecId($spec_val->id);
                            $config_count = $configuration->countBySpecId($spec_val->id);
                            ?>

                            <?php if($config_count): ?>
                            <div class="column">
                                <div class="panel panel-default">
                                    <div class="panel-heading" role="tab" id="headingTwo">
                                        <h4 class="panel-title">
                                            <?php if($features->isNotEmpty()): ?>
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#spec-<?php echo e($spec_val->id); ?>" aria-expanded="false" aria-controls="collapseTwo">
                                                <?php echo e($spec_val->spec_title); ?>

                                            </a>
                                            <?php endif; ?>
                                        </h4>
                                    </div>
                                    <div id="spec-<?php echo e($spec_val->id); ?>" class="panel-collapse collapse <?php if($loop->first): ?>collapse show <?php endif; ?> role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body">
                                        <table class="table">
                                            <tbody>
                                            <?php $carSpecification = app('\App\Modules\Cars\Repositories\CarRepository'); ?>
                                            <?php $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $spec_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                            $carFeatures = $carSpecification->getFeaturesByCarId($car->id,$spec_val->id,$spec_val->id);
                                            ?>

                                            <tr>
                                                <th scope="row"><?php echo e($spec_val->title); ?></th>
                                                <td>
                                                    <?php if($carFeatures->isNotEmpty()): ?>
                                                    <?php $__currentLoopData = $carFeatures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $car_feat_val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php echo e(optional($car_feat_val->confFeatureInfo)->config_value); ?>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    <?php else: ?>
                                                    -
                                                    <?php endif; ?>
                                                </td>
                                            </tr>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>

        {{--<div class="compare-page">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="compare-block">
                            <h1>alsdkflskdjflaskdjflkasd</h1>
                            <div class="row">
                                <div class="col-12">
                                    <div style="display: flex; justify-content : space-between;">
                                        <h5 class="mb-4" >{{optional($car->BrandInfo)->brand_name }} {{ optional($car->ModelInfo)->model_name }} {{ optional($car->VariantInfo)->variant_name }} </h5>
                                        <h5 class="mb-4" style="color: #e53012"><i class="fa fa-eye" style=""></i>  {{$car->views}}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="product-full">
                                @php
                                    if($car->car_image){
                                        $imagePath = asset($car->file_full_path).'/'.$car->car_image;
                                    }else{
                                        $imagePath = asset('admin/vehicle.jpeg');
                                    }
                                @endphp

                                <figure class="product-media">
                                    <img src="{{$imagePath}}" alt="" style="width: 100%">
                                </figure>

                                <div class="product-excerpt">
                                    <h3 class="text-center" style="color: #e53012"><q>{{$car->short_quote}}</q></h3>
                                    <h6 class="text-center" style="color: gray;">{{$car->short_content}} </h6>
                                    <h2 class="text-center" >Rs. {{number_to_words($car->starting_price)}} </h2>

                                    @php
                                        $current_date = Carbon\Carbon::now()->format('Y-m-d');
                                    @endphp

                                    @if($car->expected_launch_date >= $current_date)
                                        <h6 class="text-center" style="color: # e53012"><span style="color: gray">Expected Launch Date :</span> {{date('d M Y ',strtotime($car->expected_launch_date)) }}</h6>
                                    @endif

                                    @if($car->is_offer_available == 1)
                                        <h4 class="text-center"><a href="{{route('car.offer',$car->id)}}" class="btn btn-primary btn-sm ">Get Offers</a></h4>
                                    @endif
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
                                        $config_count = $configuration->countBySpecId($spec_val->id);
                                    @endphp

                                    @if($config_count)
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
                                                        @php
                                                            $carFeatures = $carSpecification->getFeaturesByCarId($car->id,$spec_val->id,$spec_val->id);
                                                        @endphp

                                                        <tr>
                                                            <th scope="row">{{$spec_val->title}}</th>
                                                            <td>
                                                                @if($carFeatures->isNotEmpty())
                                                                    @foreach($carFeatures as $key => $car_feat_val)
                                                                        {{optional($car_feat_val->confFeatureInfo)->config_value}}
                                                                    @endforeach
                                                                @else
                                                                    -
                                                                @endif
                                                            </td>
                                                        </tr>

                                                    @endforeach

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                            </div>
                            @endif
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>--}}
    </div>

    @if(sizeof($photo_feature)>0)
        <div class="container mt-4">
            <h4>Featured Image</h4>

            <div class="row">
                <div class="col-md-12">
                    <div class="owl-carousel owl-theme new-arrival">
                        @foreach($photo_feature as $key => $feature_val)
                            @php
                                $featimage = ($feature_val->feature_image) ? asset($feature_val->file_full_path).'/'.$feature_val->feature_image : asset('admin/image.png');
                                $ipath = asset($feature_val->file_full_path).'/'.$feature_val->feature_image;
                            @endphp

                            <div class="item">
                                <div class="card-img-actions">
                                    <a href="{{ $ipath }}" target="_blank"><img class="card-img-top img-fluid" src="{{$featimage}}" alt=""></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

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

    {{-- Similar cars --}}
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

                                        <h5>Rs. {{number_to_words($similar_car->starting_price)}}</h5>
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