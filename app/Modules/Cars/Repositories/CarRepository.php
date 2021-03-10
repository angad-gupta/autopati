<?php 
namespace App\Modules\Cars\Repositories;

use App\Modules\Cars\Entities\Car;
use App\Modules\Cars\Entities\CarGallery;
use App\Modules\Cars\Entities\CarGalleryDetail;
use App\Modules\Cars\Entities\CarPhotoFeature;
use App\Modules\Cars\Entities\CarSpecification;

class CarRepository implements CarInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Car::when(array_keys($filter, true), function ($query) use ($filter) {

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
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
}