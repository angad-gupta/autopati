<?php 
namespace App\Modules\Spec\Repositories;

use App\Modules\Spec\Entities\Spec;

class SpecRepository implements SpecInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1])
    {
        $result =Spec::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Spec::find($id);
    }
    
   public function getList(){  
       $result = Spec::pluck('spec_title', 'id');
       return $result;
   }
    
    public function save($data){
        return Spec::create($data);
    }
    
    public function update($id,$data){
        $result = Spec::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Spec::find($id);
        return $result->delete();
    }

}