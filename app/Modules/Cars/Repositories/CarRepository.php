<?php 
namespace App\Modules\Cars\Repositories;

use App\Modules\Cars\Entities\Car;
use App\Modules\Brand\Entities\Brand;
use App\Modules\VehicleModel\Entities\VehicleModel;

use App\Modules\Cars\Entities\CarGallery;
use App\Modules\Cars\Entities\CarGalleryDetail;
use App\Modules\Cars\Entities\CarPhotoFeature;
use App\Modules\Cars\Entities\CarSpecification;
use App\Modules\Cars\Entities\CarColor;


class CarRepository implements CarInterface
{ 
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Car::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findDealOfMonth($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Car::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('is_deal_of_the_month','=',1)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findMostSearched($limit = null, $filter = [], $sort = ['by' => 'views', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Car::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT',9999));
        return $result; 
        
    } 

    public function findLuxury($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Car::when(array_keys($filter, true), function ($query) use ($filter) {

        })->where('is_luxury','=',1)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findUpcomingCar($limit = null, $current_date)
    {
        $result =Car::where('expected_launch_date','>=',$current_date)->orderBy('id','ASC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findElectricCar($limit = null){
        $result =Car::where('is_electric','=',1)->orderBy('id','DESC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
    }

    public function findPopularCar($limit = null){
        $result =Car::where('is_popular','=',1)->orderBy('views','DESC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function findPopularBrand($limit = null){
        $result = Car::where('is_popular','=',1)->select('brand_id')->selectRaw('COUNT(*) AS count')->groupBy('brand_id')->orderByDesc('count')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result;
    }

    public function findLatestCar($limit = null){
        $result =Car::where('currently_launch','=',1)->orderBy('id','DESC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
    }

    public function findBrandVehicle($limit = null,$id)
    {
        $result =Car::where('brand_id','=',$id)->orderBy('id','ASC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT',9999));
        return $result; 
        
    } 

    public function findSimilarCar($limit=null,$brand_id,$model_id,$variant_id,$car_id)
    {
        $result =Car::where('id','!=',$car_id)->where('brand_id','=',$brand_id)->where('model_id','=',$model_id)->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findCar($brand_id,$model_id,$variant_id)
    {
        $result =Car::where('brand_id','=',$brand_id)->where('model_id','=',$model_id)->where('variant_id','=',$variant_id)->first();
        return $result; 
    }

    public function searchVehicle($limit = null,$data){
        $brand_result = Brand::where('brand_name', 'LIKE', "%{$data}%") ->first();
        $vehicle_model = VehicleModel::where('model_name', 'LIKE', "%{$data}%") ->first();

        if($brand_result){
            return $result =Car::where('brand_id','=',$brand_result->id)->paginate($limit ? $limit : env('DEF_PAGE_LIMIT',9999));
        }
        elseif($vehicle_model){
            return $result =Car::where('model_id','=',$vehicle_model->id)->orderBy('id','ASC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT',9999));
            return $result; 
        }
        else
        {
            return $result =Car::where('model_id','=',999999999)->orderBy('id','ASC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT',9999));
        }

    }

    public function searchVehicleBudget($limit = null,$from,$to){
        $result =Car::whereBetween('starting_price', [$from, $to])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
    }

    public function searchVehicleModel($limit = null,$model){
        $result =Car::where('model_id','=',$model)->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
    }
    
    public function find($id){
        return Car::find($id);
    }
    
   public function getList(){  
       $result = Car::pluck('model_name', 'id');
       return $result;
   }
    
    public function save($data){
        return Car::create($data);
    }

    public function update($id,$data){
        $result = Car::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Car::find($id);
        return $result->delete();
    }

    public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Car::FILE_PATH, $fileName);

        return $fileName;
   }


    /* ----------------------------------------------------------
    |                    Car Photo Features                      |
    ------------------------------------------------------------*/
    public function saveFeature($data){
        return CarPhotoFeature::create($data);
    }

    public function deleteFeature($id){
        $result = CarPhotoFeature::find($id);
        return $result->delete();
    }

    public function uploadFeature($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CarPhotoFeature::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getPhotoFeatures($car_id){
        return CarPhotoFeature::where('car_id','=',$car_id)->get();
    }
    /* ----------------------------------------------------------
    |                    End of Car Photo Features               |
    ------------------------------------------------------------*/


    /* ----------------------------------------------------------
    |                    Car Photo Gallery                       |
    ------------------------------------------------------------*/
    public function saveGallery($data){
        return CarGallery::create($data);
    }

    public function uploadMultiImages($files, $key_name){
         $filePath = [];

        foreach ($files as $file) {
            if (isset($key_name)) {
                $imageName = $file->getClientOriginalName();
                $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
                $file->move(public_path() . CarGalleryDetail::FILE_PATH, $fileName);
                $filePath[] = $fileName;
            }
        }

        return $filePath;
    }

    public function saveGalleryImage($data){
        return CarGalleryDetail::create($data);
    }

    public function getPhotoGallery($car_id){
        return CarGallery::where('car_id','=',$car_id)->get();
    }
    
    public function deletegalleryImage($id){
        $result = CarGalleryDetail::find($id);
        return $result->delete();
    }

    /* ----------------------------------------------------------
    |                    End of Car Photo Gallery               |
    ------------------------------------------------------------*/

    /* ----------------------------------------------------------
    |                    Car Specification                       |
    ------------------------------------------------------------*/
    public function getFeaturesByCarId($car_id,$spec_id,$config_id){
        return CarSpecification::where('car_id','=',$car_id)->where('spec_id','=',$spec_id)->where('config_id','=',$config_id)->get();
    }

    public function saveCarFeatures($data){
        return CarSpecification::create($data);
    }

    public function clearFeaturesById($car_id,$spec_id,$config_id){
        $result = CarSpecification::where('car_id','=',$car_id)->where('spec_id','=',$spec_id)->where('config_id','=',$config_id)->delete();
    }
    

    /* ----------------------------------------------------------
    |                    End of Car Specification                |
    ------------------------------------------------------------*/

    /* ----------------------------------------------------------
    |                    Car Available Color                     |
    ------------------------------------------------------------*/
    public function getColorByCarId($car_id){
        return CarColor::where('car_id','=',$car_id)->get();
    }

    public function saveAvailableColor($data){
        return CarColor::create($data);
    }

    public function updateAvailableColor($id,$data){
        $result = CarColor::find($id);
        return $result->update($data);
    }

    public function uploadColorCar($file){
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . CarColor::FILE_PATH, $fileName);

        return $fileName;   
    }

    public function deleteColorCar($id){
        $result = CarColor::find($id);
        return $result->delete();
    }
    /* ----------------------------------------------------------
    |                    End of  Car Available Color             |
    ------------------------------------------------------------*/



    /* ----------------------------------------------------------
    |                         Car count                          |
    ------------------------------------------------------------*/
    public function countColor($car_id){
        return CarColor::where('car_id','=',$car_id)->count();
    }

    public function countgallery($car_id){
        return CarGallery::where('car_id','=',$car_id)->count();
    }

    public function countspecification($car_id){
        return CarSpecification::where('car_id','=',$car_id)->count();
    }

    public function countFeature($car_id){
        return CarPhotoFeature::where('car_id','=',$car_id)->count();
    }

    /* ----------------------------------------------------------
    |                       End of   Car count                   |
    ------------------------------------------------------------*/

    public function countViews($car_id){
        $result = Car::find($car_id);
        $result['views'] = $result['views'] + 1;
        $result->update();

    }
}