<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements RepositoryContract
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct()
    {
        $this->makeModel();
    }

    /**
     * @return Model
     */
    public function makeModel()
    {
        $this->model = app()->make($this->model());
    }

    /**
     * @return mixed
     */
    abstract function model();

    /**
     * @return Builder
     */
    public function query()
    {
        return $this->model->query();
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = ['*'])
    {
        return $this->model->get($columns);
    }

    /**
     * @param array $columns
     * @param int $limit
     * @param null $order
     * @return mixed
     */
    public function paginate($columns = ['*'], $limit = 15, $order = null)
    {
        return $this->model->select($columns)->orderBy('id', $order)->paginate($limit);
    }

    /**
     * @param array $columns
     * @param $field
     * @param $value
     * @param int $limit
     * @param null $order
     * @return mixed
     */
    public function paginateBy($columns = ['*'], $field, $value, $limit = 15, $order = null)
    {
        return $this->model->where($field, $value)->orderBy('id', $order)->paginate($limit);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findById($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findBy($column, $value)
    {
        return $this->model->where($column, $value);
    }

    /**
     * @param array $data
     * @param int|null $id
     * @return mixed
     */
    public function save(array $data, int $id = null)
    {
        return $this->model->updateOrCreate(['id' => $id], $data);
    }

    /**
     * @param array $ids
     * @return int
     */
    public function delete(array $ids)
    {
        return $this->model->destroy($ids);
    }

    public function relations($relations)
    {
        return $this->model->$relations;
    }

    public function eagerLoading($relations)
    {
        return $this->model->with($relations)->get();
    }
}
