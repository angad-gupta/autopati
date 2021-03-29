<?php

namespace App\Modules\Subscription\Repositories;

interface SubscriptionInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    
    public function find($id);

    public function findDuplicate($data);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);

}