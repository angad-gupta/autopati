<?php 
namespace App\Modules\Brand\Repositories;

use App\Modules\Brand\Entities\Brand;

class BrandRepository implements BrandInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Brand::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findCarType($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Brand::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('type','=','Car')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findBikeType($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Brand::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('type','=','Bike')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Brand::find($id);
    }
    
   public function getList(){  
       $result = Brand::pluck('brand_name', 'id');
       return $result;
   }
    
    public function save($data){
        return Brand::create($data);
    }
    
    public function update($id,$data){
        $result = Brand::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Brand::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . Brand::FILE_PATH, $fileName);

        return $fileName;
   }

    public function getUniqueBrand(){
        return Brand::select('brand_name')
            ->groupBy('brand_name')
            ->pluck('brand_name', 'brand_name')
            ->filter(function($value, $key) {
                return  $value != null;
            });
        }

}