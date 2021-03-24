<?php

namespace App\Modules\ServiceCategory\Repositories;

interface ServiceCategoryInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    
    public function find($id);
    
    public function getList();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);

}