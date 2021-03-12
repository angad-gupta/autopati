<?php

namespace App\Modules\Cars\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

use App\Modules\Cars\Repositories\CarInterface;

class PhotoFeatureController extends Controller
{
    protected $cars;
    
    public function __construct(CarInterface $cars)
    {
        $this->cars = $cars;
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(Request $request)
    {
        $input = $request->all();

         try{

            if ($request->hasFile('feature_image')) {
                $input['feature_image'] = $this->cars->uploadFeature($input['feature_image']);
            }

            $this->cars->saveFeature($input);
            toastr()->success('Car Feature Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();

    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function storeGallery(Request $request)
    {
        $input = $request->all(); 

         $folder_files = $request->file('car_images');

         try{

            $gallery = array(

                'car_id' => $input['car_id'],
                'gallery_title' => $input['gallery_title']

            );
            $galleryData = $this->cars->saveGallery($gallery);
            $gallery_id = $galleryData->id;

            if($request->hasfile('car_images')){

            $carImage = $this->cars->uploadMultiImages($folder_files, 'car_images');

            foreach ($carImage as $image) {

                $ImageData =
                    [
                        'car_gallery_id' => $gallery_id,
                        'car_image_path' => $image,
                    ];
                 $this->cars->saveGalleryImage($ImageData);
            }
             toastr()->success('Files Uploaded Successfully');
         }

        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();

    }

    public function storePhotoGalleryImages(Request $request){
        $input = $request->all();

        $gallery_id = $input['gallery_id'];

        $folder_files = $request->file('car_images');

         try{

            if($request->hasfile('car_images')){

            $carImage = $this->cars->uploadMultiImages($folder_files, 'car_images');

            foreach ($carImage as $image) {

                $ImageData =
                    [
                        'car_gallery_id' => $gallery_id,
                        'car_image_path' => $image,
                    ];
                 $this->cars->saveGalleryImage($ImageData);
            }
             toastr()->success('Files Uploaded Successfully');
         }

        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        try{
            $this->cars->deleteFeature($id);
             toastr()->success('Car Feature Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        return redirect()->back();
    }

    public function deleteGalleryImage(Request $request){
        $input = $request->all();
        $gallery_image_id = $input['gallery_image_id'];
        try{
            $this->cars->deletegalleryImage($gallery_image_id);
             toastr()->success('Car Feature Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        return redirect()->back();
    }

    public function appendFeature(Request $request){

        if($request->ajax()){ 
            $carfeatures = DB::table('car_specifications')->select('config_feature_id')->where('config_id',$request->confid_id)->get();  
            $featuresList = DB::table('configuration_values')->where('configuration_id',$request->confid_id)->pluck("config_value","id")->all(); 
            $data = view('cars::cars.partial.features_list-ajax',compact('featuresList','carfeatures'))->render();
            return response()->json(['options'=>$data]);
        }

    }

    public function storeCarFeatures(Request $request){
        $input = $request->all();

        $featuresVal = $input['config_feature_id'];
        $car_id =$input['car_id'];
        $spec_id =$input['spec_id'];
        $confid_id =$input['confid_id'];
        
        $this->cars->clearFeaturesById($car_id,$spec_id,$confid_id);
         try{

            $countname = sizeof($featuresVal);
                for($i = 0; $i < $countname; $i++){
                 
                     if($input['config_feature_id']){  

                         $carFeaturedata['car_id'] = $input['car_id'];
                         $carFeaturedata['spec_id'] = $input['spec_id'];
                         $carFeaturedata['config_id'] = $input['confid_id'];
                         $carFeaturedata['config_feature_id'] = $input['config_feature_id'][$i];

                         $this->cars->saveCarFeatures($carFeaturedata);
                    }
                }


             toastr()->success('Car Features Added Successfully');

        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();
    }

    public function storeColorCar(Request $request){
        $data = $request->all();

         try{

            if ($request->hasFile('car_image')) {
                $data['car_image'] = $this->cars->uploadColorCar($data['car_image']);
            }

            $this->cars->saveAvailableColor($data);
            toastr()->success('Car Color Created Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        
        return redirect()->back();
    }

    public function updateColorCar(Request $request){
        $data = $request->all();

        $id = $data['car_color_id'];

         try{

            if ($request->hasFile('car_image')) {
                $data['car_image'] = $this->cars->uploadColorCar($data['car_image']);
            }

            $this->cars->updateAvailableColor($id, $data);
            toastr()->success('Car Color Image Updated Successfully');
        }catch(\Throwable $e){
            toastr()->error($e->getMessage());
        }
        
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function deleteColorCar($id)
    {
        try{
            $this->cars->deleteColorCar($id);
             toastr()->success('Available Color Car Deleted Successfully');
        }catch(\Throwable $e){
            toastr($e->getMessage())->error();
        }
        return redirect()->back();
    }

    

}
