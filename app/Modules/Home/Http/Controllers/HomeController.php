<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Modules\Cars\Repositories\CarInterface;
use App\Modules\Spec\Repositories\SpecInterface;
use App\Modules\Subscription\Repositories\SubscriptionInterface;
use App\Modules\Brand\Repositories\BrandInterface;
use App\Modules\Page\Repositories\PageInterface;
use App\Modules\Banner\Repositories\BannerInterface;
use App\Modules\ServiceCategory\Repositories\ServiceCategoryInterface;
use App\Modules\SearchLog\Repositories\SearchLogInterface;
use App\Modules\VehicleModel\Repositories\VehicleModelInterface;
use App\Modules\ServiceManagement\Repositories\ServiceManagementInterface;
use App\Modules\News\Repositories\NewsInterface;
use Carbon\Carbon;

class HomeController extends Controller
{

    protected $cars;
    protected $spec;
    protected $subscription;
    protected $brand;
    protected $page;
    protected $banner;
    protected $service_category;
    protected $search_log;
    protected $vehicle_model;
    protected $service_management;
    protected $news;
    
    public function __construct(CarInterface $cars, SpecInterface $spec, SubscriptionInterface $subscription,
    BrandInterface $brand, PageInterface $page, BannerInterface $banner,ServiceCategoryInterface $service_category,
    SearchLogInterface $search_log, VehicleModelInterface $vehicle_model, ServiceManagementInterface $service_management,
    NewsInterface $news) 
    {
        $this->cars = $cars;
        $this->spec = $spec;
        $this->subscription = $subscription;
        $this->brand = $brand;
        $this->page = $page;
        $this->banner = $banner;
        $this->service_category = $service_category;
        $this->search_log = $search_log;
        $this->vehicle_model = $vehicle_model;
        $this->service_management = $service_management;
        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $data['header_banners'] = $this->banner->findAllActiveHeaderBanner($limit=50);
        $data['deal_of_the_months'] = $this->cars->findDealOfMonth($limit=12);
        $data['car_brands'] = $this->brand->findCarType($limit=12);
        $data['bike_brands'] = $this->brand->findBikeType($limit=12);
        $data['service_categories'] = $this->service_category->findActiveServiceCategory($limit=12);
        $data['most_searched'] = $this->cars->findMostSearched($limit=12,$status=['1']);
        $data['luxury_banners'] = $this->banner->findAllActiveLuxuryBanner($limit=50);
        $data['luxuary_cars'] = $this->cars->findLuxury();
        $data['news'] = $this->news->findAllActiveNews();
        return view('home::home.index',$data);
    }

    public function carDetail($car_id)
    {
        $data['car'] = $this->cars->find($car_id);
        $data['photo_feature'] = $this->cars->getPhotoFeatures($car_id);
        $data['photo_gallery'] = $this->cars->getPhotoGallery($car_id);
        $data['car_spec'] = $this->spec->getAllCarSpec();
        $data['car_color'] = $this->cars->getColorByCarId($car_id);
        $data['views'] = $this->cars->countViews($car_id);

        return view('home::home.detail',$data);
    }

    public function carOffer($car_id)
    {
        $data['car'] = $this->cars->find($car_id);
        $data['photo_feature'] = $this->cars->getPhotoFeatures($car_id);
        $data['photo_gallery'] = $this->cars->getPhotoGallery($car_id);
        $data['car_spec'] = $this->spec->getAllCarSpec();
        $data['car_color'] = $this->cars->getColorByCarId($car_id);
        return view('home::home.offer',$data);
    }

    

    public function subscription(Request $request){
       $data = $request->all();
       $duplicate = $this->subscription->findDuplicate($data['email']); 
        if($duplicate->isEmpty()){
        try{
            $this->subscription->save($data);
            toastr()->success('Subscribed to Newsletter Subscription');

            }catch(\Throwable $e){
                toastr($e->getMessage())->error();
            }
            return redirect(route('home'));
        }else{
            toastr()->warning('Already Subscribed to Newsletter Subscription');
            return redirect(route('home'));
            }
        }

    public function listCarBrand(){
        $data['type'] = 'Car';
        $data['brands'] = $this->brand->findCarType($limit=50);
        return view('home::home.list-brand',$data);
    }

    public function listBikeBrand(){
        $data['type'] = 'Bike';
        $data['brands'] = $this->brand->findBikeType($limit=50);
        return view('home::home.list-brand',$data);
    }

    public function listMostSearchedVehicle(){
        $data['title'] = 'Most Searched Car & Bikes';
        $data['vehicles'] = $this->cars->findMostSearched($limit=50);
        return view('home::home.list',$data);
    }

    public function listDealOfMonthVehicle(){
        $data['title'] = 'Deal of the Month';
        $data['vehicles'] = $this->cars->findDealOfMonth($limit=50);
        return view('home::home.list',$data);
    }

    public function listUpcomingCar(){
        $current_date = Carbon::now()->format('Y-m-d');
        $data['title'] = 'Upcoming Cars';
        $data['vehicles'] = $this->cars->findUpcomingCar($limit=50,$current_date);
        return view('home::home.list',$data);
    }

    public function listBrandVehicle($id){

        $data['title'] = $this->brand->find($id)->brand_name;
        $data['vehicles'] = $this->cars->findBrandVehicle($limit=50,$id);
        return view('home::home.list',$data);
    }

    public function listLatestCar(){
        $data['title'] = 'Latest Car';
        $data['vehicles'] = $this->cars->findLatestCar($limit=50);
        return view('home::home.list',$data);
    }

    public function listElectricCar(){
        $data['title'] = 'Electric Car';
        $data['vehicles'] = $this->cars->findElectricCar($limit=50);
        return view('home::home.list',$data);
    }

    public function listPopularCar(){
        $data['title'] = 'Popular Car';
        $data['vehicles'] = $this->cars->findPopularCar($limit=50);
        return view('home::home.list',$data);
    }

    public function listLuxuryCar(){
        $data['title'] = 'Luxury Car';
        $data['vehicles'] = $this->cars->findLuxury($limit=50);
        return view('home::home.list',$data);
    }

    public function searchVehicle(Request $request){

        $q['keyword'] = $request->keyword;
        $q['date'] = $request->date;
        if($request->keyword != null){
            $this->search_log->save($q);
        }
        $data['title'] = $request->keyword;
        $data['vehicles'] = $this->cars->searchVehicle($limit=50,$request->keyword);
        
        return view('home::home.list',$data);
    }

    public function searchVehicleBudget(Request $request){

        $budget = $request->budget;
        $b =explode(" ", $budget);
        $budget_from = $b[0];
        $budget_to = $b[1];
      
        $data['title'] =  'Rs. '.number_format($budget_from).' - '.' Rs. '.number_format($budget_to).' Budget';
        $data['vehicles'] = $this->cars->searchVehicleBudget($limit=50,$budget_from, $budget_to);
        return view('home::home.list',$data);
    }

    public function searchVehicleModel(Request $request){
        $car_model = $request->model;
        $find_model = $this->vehicle_model->find($car_model);
        $data['title'] = $find_model->model_name;
        $data['vehicles'] = $this->cars->searchVehicleModel($limit=50,$request->model);
        return view('home::home.list',$data);
    }


    public function new(){
        return view('home::home.new');
    }

    public function page($slug){
        $data['page_content'] = $this->page->findSlugPage($slug);
        return view('home::home.page',$data);
    }

    public function compare()
    {
        $data['brand'] = $this->brand->getList(); 
        return view('home::home.compare',$data);
    }

    public function appendModel(Request $request)
    {
        if($request->ajax()){ 
            $model = DB::table('vehicle_models')->where('brand_id',$request->brand_id)->pluck("model_name","id")->all();
            $data = view('home::home.partial.select-home-model-ajax',compact('model'))->render();
            return response()->json(['options'=>$data]);
        }
    }
    public function appendvariant(Request $request)
    {
        if($request->ajax()){
            $variant = DB::table('model_variants')->where('vehicle_model_id',$request->model_id)->pluck("variant_name","id")->all();
            $data = view('home::home.partial.select-home-variant-ajax',compact('variant'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    public function compareVehicles(Request $request){

 
        if($request->first_brand_id && $request->first_model_id && $request->first_variant_id){

            $data['first_vehicle'] = $this->cars->findCar($request->first_brand_id,$request->first_model_id,$request->first_variant_id);
            if($data['first_vehicle']){
                $data['first_vehicle_photo_feature'] = $this->cars->getPhotoFeatures($data['first_vehicle']->id);
                $data['first_vehicle_photo_gallery'] = $this->cars->getPhotoGallery($data['first_vehicle']->id);
                $data['first_vehicle_color'] = $this->cars->getColorByCarId($data['first_vehicle']->id);
            }else{
                $data['first_vehicle_photo_feature'] = null;
                $data['first_vehicle_photo_gallery'] = null;
                $data['first_vehicle_color'] = null;
            }
        }
        else{
            $data['first_vehicle'] = null;
            $data['first_vehicle_photo_feature'] = null;
            $data['first_vehicle_photo_gallery'] = null;
            $data['first_vehicle_color'] = null;

        }
        

        if($request->second_brand_id && $request->second_model_id && $request->second_variant_id){
          
            $data['second_vehicle'] = $this->cars->findCar($request->second_brand_id,$request->second_model_id,$request->second_variant_id);
            if($data['second_vehicle']){
            $data['second_vehicle_photo_feature'] = $this->cars->getPhotoFeatures($data['second_vehicle']->id);
            $data['second_vehicle_photo_gallery'] = $this->cars->getPhotoGallery($data['second_vehicle']->id);
            $data['second_vehicle_color'] = $this->cars->getColorByCarId($data['second_vehicle']->id);
            }else{
                $data['second_vehicle_photo_feature'] = null;
                $data['second_vehicle_photo_gallery'] = null;
                $data['second_vehicle_color'] = null;
            }
            
        }
        else{
            $data['second_vehicle'] = null;
            $data['second_vehicle_photo_feature'] = null;
            $data['second_vehicle_photo_gallery'] = null;
            $data['second_vehicle_color'] = null;
        }

        $data['vehicle_spec'] = $this->spec->getAllCarSpec();

        return view('home::home.compare-detail',$data);
    }

    public function service($id)
    {     
        $data['service'] = $this->service_management->find($id);
        return view('home::home.service',$data);
    }

    public function serviceAll()
    {     
        $data['service_categories'] = $this->service_category->findActiveServiceCategory($limit=12);
        return view('home::home.list-services',$data);
    }

    public function news($id)
    {   
        $data['news'] = $this->news->find($id);
        return view('home::home.news',$data);
    }

    public function newsAll()
    {     
        $data['news'] = $this->news->findAllActiveNews($limit=50);
        return view('home::home.list-news',$data);
    }



}
