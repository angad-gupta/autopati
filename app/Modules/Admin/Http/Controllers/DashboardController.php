<?php

namespace App\Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;


use App\Modules\Brand\Repositories\BrandInterface;
use App\Modules\Cars\Repositories\CarInterface;
use App\Modules\VehicleModel\Repositories\VehicleModelInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\Subscription\Repositories\SubscriptionInterface;
use App\Modules\Page\Repositories\PageInterface;
use App\Modules\News\Repositories\NewsInterface;



class DashboardController extends Controller
{
    protected $brand;
    protected $cars;
    protected $vehiclemodel;
    protected $banner;
    protected $subscription;
    protected $page;
    protected $news;
    
    public function __construct(BrandInterface $brand, CarInterface $cars, VehicleModelInterface $vehiclemodel, BannerInterface $banner, SubscriptionInterface $subscription,
    PageInterface $page, NewsInterface $news) 
    {
        $this->brand = $brand;
        $this->cars = $cars;
        $this->vehiclemodel = $vehiclemodel;
        $this->banner = $banner;
        $this->subscription = $subscription;
        $this->page = $page;
        $this->news = $news;
    }
	
    public function index(Request $request)
    {
        $data['brands'] =  $this->brand->findAll();
        $data['vehiclemodel'] =  $this->vehiclemodel->findAll();
        $data['banners'] =  $this->banner->findAll();
        $data['subscriptions'] =  $this->subscription->findAll();
        $data['pages'] =  $this->page->findAll();
        $data['news'] =  $this->news->findAll();
        return view('admin::dashboard.index',$data);
    }

 

}
