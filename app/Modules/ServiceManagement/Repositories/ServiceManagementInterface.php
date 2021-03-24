<?php

namespace App\Modules\ServiceManagement\Repositories;

interface ServiceManagementInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    
    public function findAllActiveService($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();

    public function getListCategory();
    
    public function save($data);

    public function update($id,$data);

    public function delete($id);
    
    public function upload($file);

 
}