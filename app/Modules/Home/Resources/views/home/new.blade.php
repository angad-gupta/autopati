@extends('home::layouts.master')
@section('title')New | Autopati @stop 
@section('content')

@php
    $empty_vehicle = '-';
@endphp
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



{{-- 
<div class="page-banner">
    <img src="https://carwow-uk.imgix.net/car-review/reviews-landing-page/hero_image.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=1920" alt="">
</div>

<div class="main-title pt-2 pb-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <ul class="breadcrumbs list-unstyled d-flex">
                    <li><a href="">Home</a></li>
                    <li><i class="fa fa-angle-right"></i></li>
                    <li>News & Reviews</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section-div section-review bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Reviews by car type</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="section-review-card">
                    <span class="s-review-img">
                        <img src="https://carwow-uk.imgix.net/car-review/reviews-landing-page/small-cars.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    </span>
                    <h4>Small Cars <i class="fa fa-angle-right"></i></h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="section-review-card">
                    <div class="s-review-img">
                        <img src="https://carwow-uk.imgix.net/car-review/reviews-landing-page/hybrid-cars.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    </div>
                    <h4>Sedan <i class="fa fa-angle-right"></i></h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="section-review-card">
                    <div class="s-review-img">
                        <img src="https://carwow-uk.imgix.net/car-review/reviews-landing-page/suvs.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    </div>
                    <h4>SUV <i class="fa fa-angle-right"></i></h4>
                </a>
            </div>
            <div class="col-md-3">
                <a href="#" class="section-review-card">
                    <div class="s-review-img">
                        <img src="https://carwow-uk.imgix.net/car-review/reviews-landing-page/7-seater-cars.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    </div>
                    <h4>MUV <i class="fa fa-angle-right"></i></h4>
                </a>
            </div>
        </div>
    </div>
</div>

<div class="section-div section-cartype bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>All car types</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled ul-col-5 s-cartype mt-3">
                    <li><a href="#">4X4 Cars</a></li>
                    <li><a href="#">Coupes</a></li>
                    <li><a href="#">First Cars</a></li>
                    <li><a href="#">MPVs</a></li>
                    <li><a href="#">Small Cars</a></li>
                    <li><a href="#">7-Seater Cars</a></li>
                    <li><a href="#">Economical Cars</a></li>
                    <li><a href="#">Hatchbacks</a></li>
                    <li><a href="#">Motability Cars</a></li>
                    <li><a href="#">Sports Cars</a></li>
                    <li><a href="#">Automatic Cars</a></li>
                    <li><a href="#">Electric Cars</a></li>
                    <li><a href="#">Hot Hatches</a></li>
                    <li><a href="#">SUVs</a></li>
                    <li><a href="#">Cheap Cars</a></li>
                    <li><a href="#">Estate Cars</a></li>
                    <li><a href="#">Hybrid Cars</a></li>
                    <li><a href="#">Saloon Cars</a></li>
                    <li><a href="#">Convertibles</a></li>
                    <li><a href="#">Family Cars</a></li>
                    <li><a href="#">Luxury Cars</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section-div section-review bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Most Popular Cars</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/mercedes-a-class-red-driving-front-1-scaled.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Mercedes</h6>
                        <h5 class="mb-0">A-Class</h5>
                        <p class="mb-0">A classy small car that’s packed with tech</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/27268-RLinefront-1-scaled.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Volkswagen</h6>
                        <h5 class="mb-0">Tiguan</h5>
                        <p class="mb-0">Plush, practical five-seat family SUV</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/XC40-driving-front-3-scaled.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Volvo</h6>
                        <h5 class="mb-0">XC40</h5>
                        <p class="mb-0">A comfortable premium SUV with funky styling</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/AUDI_Q3_024.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Audi</h6>
                        <h5 class="mb-0">Q3</h5>
                        <p class="mb-0">A stylish small SUV with plenty of space inside</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/PEUGEOT_3008_TESTDRIVE_1020TC138-scaled-e1611596346433.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Peugeot</h6>
                        <h5 class="mb-0">3008</h5>
                        <p class="mb-0">Striking five-seat family SUV</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/mercedes-a-class-red-driving-front-1-scaled.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Mercedes</h6>
                        <h5 class="mb-0">A-Class</h5>
                        <p class="mb-0">A classy small car that’s packed with tech</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-div section-review bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>Top Rated Cars</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/Skoda-Citigo-Thumbnail-1.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Mercedes</h6>
                        <h5 class="mb-0">A-Class</h5>
                        <p class="mb-0">A classy small car that’s packed with tech</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/VW_8127.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Volkswagen</h6>
                        <h5 class="mb-0">Tiguan</h5>
                        <p class="mb-0">Plush, practical five-seat family SUV</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/seat-mii-driving-4.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Volvo</h6>
                        <h5 class="mb-0">XC40</h5>
                        <p class="mb-0">A comfortable premium SUV with funky styling</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/Hyundai-i10revised.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Audi</h6>
                        <h5 class="mb-0">Q3</h5>
                        <p class="mb-0">A stylish small SUV with plenty of space inside</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/Polo-Match-1.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Peugeot</h6>
                        <h5 class="mb-0">3008</h5>
                        <p class="mb-0">Striking five-seat family SUV</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="review-card">
                    <img src="https://carwow-uk-wp-3.imgix.net/PEUGEOT_208_TESTDRIVE_0919TC-111.jpg?auto=format&cs=tinysrgb&fit=clip&ixlib=rb-1.1.0&q=60&w=750" alt="">
                    <div class="review-card_desc">
                        <h6 class="mb-1">Mercedes</h6>
                        <h5 class="mb-0">A-Class</h5>
                        <p class="mb-0">A classy small car that’s packed with tech</p>
                        <div class="rating-block">
                            <div class="my-rating"></div>
                            <span>8/10</span>
                            <a href="">Read Review</a>
                        </div>
                        <hr>
                        <h5>£24,095 - £38,095</h5>
                        <h5 class="text-success mb-4">Avg. saving £2,542</h5>
                        <a href="" class="btn btn-success w-100">Compare Offers</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section-div section-cartype bg-grey">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h3>All Make Reviews</h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <ul class="list-unstyled ul-col-5 s-cartype mt-3">
                    <li><a href="#">Abarth</a></li>
                    <li><a href="#">DS</a></li>
                    <li><a href="#">Kia</a></li>
                    <li><a href="#">Mitsubishi</a></li>
                    <li><a href="#">Nissan</a></li>
                    <li><a href="#">Subaru</a></li>
                    <li><a href="#">Alpine</a></li>
                    <li><a href="#">Honda</a></li>
                    <li><a href="#">Mazda</a></li>
                    <li><a href="#">Mercedez</a></li>
                    <li><a href="#">Jeep</a></li>
                    <li><a href="#">Renault</a></li>
                    <li><a href="#">Toyota</a></li>
                    <li><a href="#">Cupra</a></li>
                    <li><a href="#">Zaguar</a></li>
                    <li><a href="#">Smart</a></li>
                    <li><a href="#">Mini</a></li>
                    <li><a href="#">Volvo</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="section-div bg-grey">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-6">
                <h3 class="mb-4">Don’t see what you’re after?</h3>
                <a href="#" class="btn btn-primary">Select a car</a>
            </div>
        </div>
    </div>
</div>


 --}}





@endsection