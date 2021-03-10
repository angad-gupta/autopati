<?php

namespace App\Modules\Configuration\Repositories;

interface ConfigurationInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
    public function findAllBySpecId($specId, $limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'ASC'], $status = [0, 1]);

    public function find($id);
    
    public function getList();
    
    public function save($data);
    public function saveConfigVal($data);

    public function update($id,$data);

    public function delete($id);
    
    public function deleteVal($id);

    public function countBySpecId($id);
    
    public function getBySpecId($id);
    
}