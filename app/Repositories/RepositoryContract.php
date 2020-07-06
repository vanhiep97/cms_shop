<?php

namespace App\Repositories;

interface RepositoryContract
{
    public function query();

    public function all($columns = ['*']);

    public function paginate($columns, $limit = 15, $order = null);

    public function paginateBy($columns = ['*'], $field, $value, $limit = 15, $order = null);

    public function findById($id);

    public function findBy($column, $value);

    public function save(array $data, int $id = null);

    public function delete(array $ids);

    public function relations($relations);
}
