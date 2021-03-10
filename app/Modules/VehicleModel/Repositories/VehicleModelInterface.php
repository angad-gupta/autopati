<?php

namespace App\Modules\VehicleModel\Repositories;

interface VehicleModelInterface
{
    public function findAll($limit=null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);
   
    public function find($id);
    public function findVariant($id);
    
    public function getList();
    public function getListVariant();
    
    public function save($data);
    public function saveVariant($data);

    public function update($id,$data);

    public function delete($id);
    public function deletevariantById($id);
    public function deletevariant($id);
  
    public function getUniqueModel();
}