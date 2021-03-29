<?php

namespace App\Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

use App\Modules\Cars\Repositories\CarInterface;
use App\Modules\Spec\Repositories\SpecInterface;
use App\Modules\Subscription\Repositories\SubscriptionInterface;
use App\Modules\Brand\Repositories\BrandInterface;

class HomeController extends Controller
{

    protected $cars;
    protected $spec;
    protected $subscription;
    protected $brand;
    
    public function __construct(CarInterface $cars, SpecInterface $spec, SubscriptionInterface $subscription,BrandInterface $brand) 
    {
        $this->cars = $cars;
        $this->spec = $spec;
        $this->subscription = $subscription;
        $this->brand = $brand;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('home::home.index');
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

    public function subscription(Request $request){
       $data = $request->all();
       $duplicate = $this->subscription->findDuplicate($data['email']); 
        if($duplicate->isEmpty()){
        try{
            $this->subscription->save($data);
            toastr()->success('Added to Newsletter Subscription');

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

    public function listBrandVehicle($id){

        $data['title'] = $this->brand->find($id)->brand_name;
        $data['vehicles'] = $this->cars->findBrandVehicle($limit=50,$id);
        return view('home::home.list',$data);
    }

    public function searchVehicle(Request $request){
        $data['title'] = $request->search;
        $data['vehicles'] = $this->cars->searchVehicle($limit=50,$request->search);
        return view('home::home.list',$data);
    }



}
