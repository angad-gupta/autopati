<?php 
namespace App\Modules\VehicleModel\Repositories;

use App\Modules\VehicleModel\Entities\VehicleModel;
use App\Modules\VehicleModel\Entities\ModelVariant;

class VehicleModelRepository implements VehicleModelInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =VehicleModel::when(array_keys($filter, true), function ($query) use ($filter) {
           
        if (isset($filter['brand_id']) && !is_null($filter['brand_id'])) {
            $query->whereIn('brand_id', $filter['brand_id']);
        }
        if (isset($filter['model_name']) && !is_null($filter['model_name'])) {
            $query->whereIn('model_name', $filter['model_name']);
        }

        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function find($id){
        return VehicleModel::find($id);
    }
    
    public function findVariant($id){
        return ModelVariant::find($id);
    }
    
   public function getList(){  
       $result = VehicleModel::pluck('model_name', 'id');
       return $result;
   }
    
   public function getListVariant(){  
       $result = ModelVariant::pluck('variant_name', 'id');
       return $result;
   }
    
    public function save($data){
        return VehicleModel::create($data);
    }
    public function saveVariant($data){ 
        return ModelVariant::create($data);
    }
    
    public function update($id,$data){
        $result = VehicleModel::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = VehicleModel::find($id);
        return $result->delete();
    }

    public function deletevariantById($id){
        return ModelVariant::where('vehicle_model_id','=',$id)->delete();
    }
    public function deletevariant($id){
        $result = ModelVariant::find($id);
        return $result->delete();
    }

    public function getUniqueModel(){
        return VehicleModel::select('model_name')
            ->groupBy('model_name')
            ->pluck('model_name', 'model_name')
            ->filter(function($value, $key) {
                return  $value != null;
            });
    }

}