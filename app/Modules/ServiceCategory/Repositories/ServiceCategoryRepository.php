<?php 
namespace App\Modules\ServiceCategory\Repositories;

use App\Modules\ServiceCategory\Entities\ServiceCategory;

class ServiceCategoryRepository implements ServiceCategoryInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =ServiceCategory::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return ServiceCategory::find($id);
    }
    
   public function getList(){  
       $result = ServiceCategory::pluck('title', 'id');
       return $result;
   }
    
    public function save($data){
        return ServiceCategory::create($data);
    }
    
    public function update($id,$data){
        $result = ServiceCategory::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = ServiceCategory::find($id);
        return $result->delete();
    }


}