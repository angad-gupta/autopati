<?php

namespace App\Modules\SearchLog\Repositories;

interface SearchLogInterface
{
    public function findAll($limit = null, $filter = [], $sort = ['by' => 'id', 'sort' => 'DESC'], $status = [0, 1]);


    public function find($id);

    public function most_searched();

    public function getList();

    public function save($data);

    public function update($id, $data);

    public function delete($id);
}