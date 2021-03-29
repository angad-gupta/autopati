<?php 
namespace App\Modules\Subscription\Repositories;

use App\Modules\Subscription\Entities\Subscription;

class SubscriptionRepository implements SubscriptionInterface
{
     
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1])
    {
        $result =Subscription::when(array_keys($filter, true), function ($query) use ($filter) {
           
        })->orderBy($sort['by'], $sort['sort'])->paginate($limit ? $limit : env('DEF_PAGE_LIMIT', 9999));
        return $result; 
        
    } 
    
    public function find($id){
        return Subscription::find($id);
    }

    public function findDuplicate($email){
        return Subscription::where('email','=',$email)->get();
    }
    
   public function getList(){  
       $result = Subscription::pluck('title', 'id');
       return $result;
   }
    
    public function save($data){
        return Subscription::create($data);
    }
    
    public function update($id,$data){
        $result = Subscription::find($id);
        return $result->update($data);
    }
    
    public function delete($id){
        $result = Subscription::find($id);
        return $result->delete();
    }


}