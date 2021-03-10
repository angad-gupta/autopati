<?php 
namespace App\Modules\News\Repositories;

use App\Modules\News\Entities\News;

class NewsRepository implements NewsInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =News::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 

    public function findAllActiveNews($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =News::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    public function findRelatedNews($blog_id,$limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =News::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->where('id','!=',$blog_id)->where('status','=','1')->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    }
    
    public function find($id){
        return News::find($id);
    }
    
   public function getList(){  
       $result = News::pluck('title', 'id');
      
       return $result;
   }
    
    public function save($data){
        return News::create($data);
    }
    
    public function update($id,$data){
        $result = News::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = News::find($id);
        return $result->delete();
    }
    
   public function upload($file){
        
        $imageName = $file->getClientOriginalName();
        $fileName = date('Y-m-d-h-i-s') . '-' . preg_replace('[ ]', '-', $imageName);

        $file->move(public_path() . News::FILE_PATH, $fileName);

        return $fileName;
   }

}