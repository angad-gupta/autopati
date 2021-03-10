<?php 
namespace App\Modules\Configuration\Repositories;

use App\Modules\Configuration\Entities\Configuration;
use App\Modules\Configuration\Entities\ConfigurationValue;

class ConfigurationRepository implements ConfigurationInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Configuration::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    public function findAllBySpecId($specId, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Configuration::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('spec_id','=',$specId)->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Configuration::find($id);
    }
    
   public function getList(){  
       $result = Configuration::pluck('banner_title', 'id');
       return $result;
   }
    
    public function save($data){
        return Configuration::create($data);
    }

    public function saveConfigVal($data){
        return ConfigurationValue::create($data);
    }
    
    public function update($id,$data){
        $result = Configuration::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Configuration::find($id);
        return $result->delete();
    }

    public function deleteVal($id){
        $result =  ConfigurationValue::find($id);
        return $result->delete();
    }

    public function countBySpecId($id){
        return Configuration::where('spec_id','=',$id)->count();
    }
    public function getBySpecId($id){
        return Configuration::where('spec_id','=',$id)->get();
    }

}