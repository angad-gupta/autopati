<?php 
namespace App\Modules\ServiceManagement\Repositories;

use App\Modules\ServiceManagement\Entities\ServiceManagement;
use App\Modules\ServiceCategory\Entities\ServiceCategory;


class ServiceManagementRepository implements ServiceManagementInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =ServiceManagement::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveService($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =ServiceManagement::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }

    public function findAllActiveServiceCategory($limit = null,$id){
        return ServiceManagement::where('status','=','1')->where('category_id','=',$id)->orderBy('id','ASC')->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
    }

    public function find($id){
        return ServiceManagement::find($id);
    }
    
   public function getList(){  
       $service_mgt = ServiceManagement::pluck('title', 'id');
      
       return $service_mgt;
   }

   public function getListCategory(){  
        $result =ServiceCategory::where('status','=','1')->pluck('title', 'id');;
        return $result; 
        }
    
    public function save($data){
        return ServiceManagement::create($data);
    }
    
    public function update($id,$data){
        $service_mgt = ServiceManagement::find($id);
        return $service_mgt->update($data);
    }
    
    public function delete($id){
        $service_mgt = ServiceManagement::find($id);
        return $service_mgt->delete();
    }
    
   public function upload($file){
    
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);
        $file->move(public_path() . ServiceManagement::FILE_PATH, $fileName);
 
        return $fileName;
      
   }


}