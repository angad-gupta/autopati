<header>
    <div class="top-header">
        <div class="container">
            <div class="d-flex">
                <a class="navbar-brand mr-3 logo" href="/">
                    @inject('settings', '\App\Modules\Setting\Repositories\SettingRepository')
                    @php
                        $setting = $settings->getdata();
                    @endphp

                    @if($setting != null && $setting->company_logo != null)
                        <img src="{{asset('uploads/setting/'.$setting->company_logo)}}" alt="" style="height:60px;width:auto;">
                    @else
                        <h4 class="mb-0" style="font-size: 28px;">Autopati</h4>
                    @endif
                </a>

                <nav class="navbar navbar-expand-lg navbar-light bg-light">
                    <div class="container">
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                                aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>

                        </button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="">Cars</a>
                                    <div class="dropdown">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                @inject('popular', '\App\Modules\Cars\Repositories\CarRepository')
                                                @php
                                                    $popular_car = $popular->findPopularCar()->first();
                                                @endphp
                                                <a href="{{route('car.detail',$popular_car->id)}}" class="dropdown-sponsored d-block" title="">
                                                    <img src="{{($popular_car->car_image) ? asset($popular_car->file_full_path).'/'.$popular_car->car_image : asset('admin/default.png')}}" alt="">
                                                    <div class="dropdown-sponsored__desc">
                                                        <h6 class="mb-0">{{optional($popular_car->BrandInfo)->brand_name }} {{ optional($popular_car->ModelInfo)->model_name }}</h6>
                                                        <a href="{{route('car.detail',$popular_car->id)}}" class="small mb-0 text-primary">Know More</a>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="/">Search Cars</a></li>
                                                    <li><a href="{{route('list.latest-car')}}">Latest Cars</a></li>
                                                    <li><a href="{{route('list.most-searched-car')}}">Most Searched Cars</a></li>
                                                    <li><a href="{{route('list.electric-car')}}">Electric Cars</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="/">Suggest me a Car</a></li>
                                                    <li><a href="{{route('compare')}}">Compare Cars</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="">New Bikes</a>
                                    <div class="dropdown">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <a href="#" class="dropdown-sponsored d-block" title="Royal Enfield Classic 350">
                                                    <img src="https://imgd.aeplcdn.com/310x174/bw/models/royal-enfield-classic-350-single-channel-abs--bs-vi20200303121804.jpg" alt="">
                                                    <div class="dropdown-sponsored__desc">
                                                        <h6 class="mb-0">Royal Enfield Classic 350</h6>
                                                        <p class="small mb-0">Know More</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Search New Bike</a></li>
                                                    <li><a href="#">Latest Bike</a></li>
                                                    <li><a href="#">Most Popular Bike</a></li>
                                                    <li><a href="#">Luxury Bike</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Suggest me a Bike</a></li>
                                                    <li><a href="#">Compare Bike</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="">Brands</a>
                                    @inject('brands', '\App\Modules\Brand\Repositories\BrandRepository')
                                    @php
                                        $all_brands = $brands->findAll($limit=50);
                                    @endphp
                                    <div class="dropdown">
                                        <div class="row">
                                            @foreach($all_brands as $brand)
                                                <div class="col-md-3 col-lg-2">
                                                    <a href="{{route('list.brand.vehicles',$brand->id)}}" class="brand-menu">
                                                        <img src="{{($brand->brand_logo) ? asset($brand->file_full_path).'/'.$brand->brand_logo : asset('admin/default.png')}}" alt="{{$brand->brand_name}}" alt="">
                                                        <h5>{{$brand->brand_name}}</h5>
                                                    </a>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('news.all')}}">News & Reviews</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('service.all')}}">Services</a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="">Auto Ventures</a>
                                    <div class="dropdown">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <a href="#" class="dropdown-sponsored d-block" title="Royal Enfield Classic 350">
                                                    <img src="https://imgd.aeplcdn.com/310x174/bw/models/royal-enfield-classic-350-single-channel-abs--bs-vi20200303121804.jpg" alt="">
                                                    <div class="dropdown-sponsored__desc">
                                                        <h6 class="mb-0">Royal Enfield Classic 350</h6>
                                                        <p class="small mb-0">Know More</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Used Car</a></li>
                                                    <li><a href="#">Used Bike</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Accessories & Merchandise Dealers & Suppliers tab</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="">More</a>
                                    <div class="dropdown">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <a href="#" class="dropdown-sponsored d-block" title="Royal Enfield Classic 350">
                                                    <img src="https://imgd.aeplcdn.com/310x174/bw/models/royal-enfield-classic-350-single-channel-abs--bs-vi20200303121804.jpg" alt="">
                                                    <div class="dropdown-sponsored__desc">
                                                        <h6 class="mb-0">Royal Enfield Classic 350</h6>
                                                        <p class="small mb-0">Know More</p>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Banking Services</a></li>
                                                    <li><a href="#">Auto Price</a></li>
                                                </ul>
                                            </div>

                                            <div class="col-sm-12 col-md-12 col-lg-3">
                                                <ul class="list-unstyled">
                                                    <li><a href="#">Insurance</a></li>
                                                    <li><a href="#">Tax and Policy</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </li> --}}
                            </ul>
                        </div>
                    </div>
                </nav>

                @php
                    $current_date = Carbon\Carbon::now()->format('Y-m-d H:i:s');
                @endphp

                <div class="d-flex align-items-center">
                    <form action="{{route('search')}}" class="ap-search mr-3">
                        <input type="text" name="date" id="" value="{{$current_date}}" hidden>
                        <div class="search-box d-flex">
                            <input type="text" name="keyword" id="" placeholder="Search..." autocomplete="off">
                            <button type="submit" class="btn btn-primary" style="padding:8px 18px;border-radius: 0px;"><i class="fa fa-search text-white"></i></button>
                        </div>
                        <div class="search-box-container">
                            <h6>Trending Searches</h6>
                            @inject('search', '\App\Modules\SearchLog\Repositories\SearchLogRepository')
                            @php
                                $most_searched = $search->most_searched();
                            @endphp
                            <ul class="list-unstyled mb-0">
                                @foreach($most_searched as $ms)
                                    <li><a href="{{route('search')}}?date={{$current_date}}&keyword={{$ms->keyword}}">{{$ms->keyword}}</a></li>
                                @endforeach

                            </ul>
                        </div>
                    </form>

                  <div class="services_item_desc">
                      <h6> <a href="#" data-toggle="modal" data-target="#exampleModal">Login</a></h6>
                  </div>
                  <div class="services_item_desc">
                    <h6> <a href="#" data-toggle="modal" data-target="#exampleModal">Register</a></h6>
                </div>
                   

                    <i class="fa fa-bars btn-nav-toggler" id="mobile-trigger"></i>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-form">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login to Autopati</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <input type="text" class="form-control" id="" placeholder="Email or Phone Number">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 mb-3">
                            <input type="password" class="form-control" id="" placeholder="Password">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-6">
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                <label class="form-check-label text-muted" for="exampleCheck1">Remember Me</label>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-check mb-3 d-flex justify-content-end">
                                <a href="#" class="text-danger">Forget Password?</a>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex">
                        <button class="btn btn-primary w-70 m-auto" type="submit">Login</button>
                    </div>
                </form>
                <hr class="mt-4 mb-4">
                <div class="social-login">
                    <ul class="list-unstyled mb-0 text-center">
                        <li><button type="button" class="btn btn-outline-secondary w-70 mb-3"><i class="fa fa-facebook"></i> Continue with Facebook</button></li>
                        <li><button type="button" class="btn btn-outline-secondary w-70 mb-3"><i class="fa fa-google"></i> Continue with Google</button></li>
                        <li>Don't have an Account? <a href="#">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>


<!--    <div class="sidenav" id="navbarSupportedContent">-->
<!--        <ul class="navbar-nav mr-auto">-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link active" href="">Gemstones</a>-->
<!--                <div class="dropdown">-->
<!--                    <div class="row">-->
<!--                        <div class="col-sm-12 col-md-12 col-lg-3">-->
<!--                            <ul class="list-unstyled">-->
<!--                                <li><a href="#">Red Stone</a></li>-->
<!--                                <li><a href="#">Blue Stone</a></li>-->
<!--                                <li><a href="#">Yellow Stone</a></li>-->
<!--                            </ul>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="">Semi-Mounts</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="">Fine Jewelry</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="">Drilled Stones</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="">Findings</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="">Carvings</a>-->
<!--            </li>-->
<!--            <li class="nav-item">-->
<!--                <a class="nav-link" href="">Clearance</a>-->
<!--            </li>-->
<!---->
<!--        </ul>-->
<!--    </div>-->

<div class="body-overlay"></div>

