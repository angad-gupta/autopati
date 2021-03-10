<?php

namespace App\Modules\Cars\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Modules\Cars\Repositories\CarInterface;
use App\Modules\Brand\Repositories\BrandInterface;
use App\Modules\VehicleModel\Repositories\VehicleModelInterface;
use App\Modules\Spec\Repositories\SpecInterface;

class CarsController extends Controller
{
    protected $cars;
    protected $brand;
    protected $vehiclemodel;
    protected $spec;
    
    public function __construct(CarInterface $cars, BrandInterface $brand, VehicleModelInterface $vehiclemodel,SpecInterface $spec)
    {
        $this->cars = $cars;
        $this->brand = $brand;
        $this->vehiclemodel = $vehiclemodel;
        $this->spec = $spec;
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(Request $request)
    { 
        $search = $request->all();
        $data['brand_name'] = $this->brand->getList(); 
        $data['model_name'] = $this->vehiclemodel->getList(); 
        $data['variant_name'] = $this->vehiclemodel->getListVariant();  

        $data['cars_info'] = $this->cars->findAll($limit= 50,$search);  
        $data['search_value'] = $search;

        return view('cars::cars.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $data['is_edit'] = false;
        $data['brand'] = $this->brand->getList(); 
        return view('cars::cars.create', $data);
    }

    public function appendModel(Request $request)
    {
        if($request->ajax()){ 
            $model = DB::table('vehicle_models')->where('brand_id',$request->brand_id)->pluck("model_name","id")->all();
            $data = view('cars::cars.partial.select-model-ajax',compact('model'))->render();
            return response()->json(['options'=>$data]);
        }
    }
    public function appendvariant(Request $request)
    {
        if($request->ajax()){
            $variant = DB::table('model_variants')->where('vehicle_model_id',$request->model_id)->pluck("variant_name","id")->all();
            $data = view('cars::cars.partial.select-variant-ajax',compact('variant'))->render();
            return response()->json(['options'=>$data]);
        }
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $data = $request->all();
        
        $price = $data['starting_price'];
        $discount_percent = $data['discount_percent'];
        $is_offer_available = $data['is_offer_available'];
        $data['discount_amount'] = ($is_offer_available =='1') ? ($discount_percent / 100) * $price : 0;

         try{

            if ($request->hasFile('car_image')) {
                $data['car_image'] = $this->cars->upload($data['car_image']);
            }

            $this->cars->save($data);
            toastr()->success('Car Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect(route('cars.index'));
    }

   public function profile(Request $request){
        $input = $request->all();

        $car_id = $input['car_id'];  
        $data['brand'] = $this->brand->getList(); 
        $data['model'] = $this->vehiclemodel->getList(); 
        $data['variant'] = $this->vehiclemodel->getListVariant();  
        $data['car_info'] = $this->cars->find($car_id);
        
        $data['photo_feature'] = $this->cars->getPhotoFeatures($car_id);
        $data['photo_gallery'] = $this->cars->getPhotoGallery($car_id);
        $data['car_spec'] = $this->spec->getAllCarSpec();

        return view('cars::cars.profile', $data);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('cars::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('cars::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        
        if(array_key_exists('discount_percent', $data)){
            $price = $data['starting_price'];
            $discount_percent = $data['discount_percent'];
            $is_offer_available = $data['is_offer_available'];
            $data['discount_amount'] = ($is_offer_available =='1') ? ($discount_percent / 100) * $price : 0;
        }

         try{

            if ($request->hasFile('car_image')) {
                $data['car_image'] = $this->cars->upload($data['car_image']);
            }

            $this->cars->update($id, $data);
            toastr()->success('Car Updated Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        if(array_key_exists('car_profile', $data)){
            return redirect()->back();
        }else{
            return redirect(route('cars.index'));
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
