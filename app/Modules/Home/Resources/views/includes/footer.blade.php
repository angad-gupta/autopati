
<section class="rtt-subscribe" style="background-image: url('home/img/banner-two.png');">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="text-white">
                    <h3>Want to Know More, </h3>
                    <p class="mb-0">
                        Share your email address
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="rtt-subscribe--form justify-content-end">
                    <form action="{{route('subscription')}}" method="post">
                        @csrf
                        <input class="form-control" type="email" name="email" value="" placeholder="Your email address here" required>
                        <input type="number" name="status" value="1" hidden/>
                        <button class="btn btn-info" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="section-padding">
    <div class="container">
        <div class="row">
            @inject('setting', '\App\Modules\Setting\Repositories\SettingRepository')
            @php
                $footer = $setting->getdata();
            @endphp
            <div class="col-sm-6 col-md-3">
                <h5>{{$footer->company_name}}</h5>
                <ul class="list-info">
                    <li> <i class="fa fa-map-marker"></i>
                        {{$footer->address1}}
                    </li>
                    <li><i class="fa fa-phone"></i>
                        {{$footer->contact_no1}}
                    </li>
                    <li><i class="fa fa-envelope"></i>
                        {{$footer->company_email}}
                    </li>
                </ul>
                <div class="ap-social mt-4 d-flex">
                    <a class="fb" href="{{$footer->facebook_link}}" target="__blank"><i class="fa fa-facebook"></i></a>
                    <a class="twit" href="{{$footer->twitter_link}}" target="__blank"><i class="fa fa-twitter"></i></a>
                    <a class="youtube" href="{{$footer->youtube_link}}" target="__blank"><i class="fa fa-youtube"></i></a>
                    <a style="background: #f16ad4" href="{{$footer->instagram_link}}" target="__blank"><i class="fa fa-instagram"></i></a>
                </div>
            </div>

            <div class="col-sm-6 col-md-3 mt-3 mt-md-0">
                <h5>Useful Links</h5>
                @inject('pages', '\App\Modules\Page\Repositories\PageRepository')
                @php
                    $active_pages = $pages->findActivePage($limit=50);
                @endphp


                <ul class="list-unstyled f-links">
                    <li><a href="/">Home</a></li>
                    <li><a href="{{route('news.all')}}">Blog</a></li>
                    @foreach($active_pages as $active_page)
                        <li><a href="{{route('page',$active_page->slug)}}">{{$active_page->title}}</a></li>
                    @endforeach
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>

            <div class="col-sm-6 col-md-3 mt-3 mt-sm- 3 mt-md-0">
                <h5>Customer Links</h5>
                <ul class="list-unstyled f-links">
                    {{-- <li><a href="{{route('list.latest-car')}}">Cars</a></li> --}}
                    <li><a href="{{route('list.car-brand')}}">Brand</a></li>
                    <li><a href="{{route('compare')}}">Compare</a></li>
                    <li> <a href="#" data-toggle="modal" data-target="#exampleModal">Register</a></li>
                    {{-- <li><a href="{{route('list.popular-car')}}">People's Choice Brand</a></li> --}}
                 
                </ul>
            </div>

            <div class="col-sm-6 col-md-3 mt-3 mt-sm- 3 mt-md-0">
                <h5>Popular Cars By Make</h5>
                @inject('popular_brand', '\App\Modules\Cars\Repositories\CarRepository')
                @php
                    $popular_brands = $popular_brand->findPopularBrand($limit=5);

                @endphp

                <ul class="list-unstyled f-links">
                    @foreach($popular_brands as $popular_brand)
                        <li><a href="{{route('list.brand.vehicles',$popular_brand->brand_id)}}">{{$popular_brand->BrandInfo->brand_name}}</a></li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>

    <a id="back2Top" title="Back to top" href="#"><i class="fa fa-angle-up"></i></a>
</footer>

<div class="footer-bottom">
    <div class="container">
        <p class="m-0 text-center">
            <small>© {{$footer->company_copyright}} <a href="/">{{$footer->company_name}}</a>. Developed by <a href="https://www.bidhee.com/" target="__blank">Bidhee Pvt. Ltd.</a></small>
        </p>
    </div>
</div>

<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flexslider/2.7.2/jquery.flexslider-min.js"></script>
<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.js"></script>
<script src="{{asset('home/js/owl.carousel.min.js?v=1.1')}}"></script>
<script src="{{asset('home/js/imagezoom.js')}}"></script>
<script src="{{asset('home/js/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('home/js/jquery.star-rating-svg.min.js')}}"></script>
<script src="{{asset('home/js/custom.js')}}"></script>

