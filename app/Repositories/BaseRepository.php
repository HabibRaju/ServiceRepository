<?php

namespace App\Repositories;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements BaseRepositoryInterface
{
    protected $modelName;

    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Instantiate Model
     *
     * @throws \Exception
     */
    public function setModel()
    {
        //check if the class exists
        if (class_exists($this->modelName)) {
            $this->model = new $this->modelName();

            //check object is a instanceof Illuminate\Database\Eloquent\Model
            if (!$this->model instanceof Model) {
                throw new \Exception("{$this->modelName} must be an instance of Illuminate\Database\Eloquent\Model");
            }
        } else {
            throw new \Exception('No model name defined');
        }
    }

    public function getModel()
    {
        return $this->model;
    }

    // public function paginate($perPage, $columns = ['*'])
    // {
    //     $query = $this->allQuery();

    //     return $query->paginate($perPage, $columns);
    // }

    public function findOrFail($id, $relation = null, array $orderBy = null)
    {
        return $this->prepareModelForRelationAndOrder($relation, $orderBy)->findOrFail($id);
    }

    public function findOneBy(array $criteria, $relation = null)
    {
        return $this->prepareModelForRelationAndOrder($relation)->where($criteria)->first();
    }

    public function getAll()
    {
        return $this->model->get();
    }

    public function save(array $data)
    {
        return $this->model->create($data);
    }


    public function update($id, $data = [])
    {
        $resource = $this->findOrFail($id);
        $resource->update($data);

        return $resource;
    }


    public function delete($id)
    {
        $resource = $this->findOrFail($id);
        $resource->delete();

        return $resource;
    }

    /**
     * @param $relation
     * @param array|null $orderBy [[Column], [Direction]]
     * @return \Illuminate\Database\Eloquent\Builder|Model
     */
    private function prepareModelForRelationAndOrder($relation, array $orderBy = null)
    {
        $model = $this->model;
        if ($relation) {
            $model = $model->with($relation);
        }
        if ($orderBy) {
            $model = $model->orderBy($orderBy['column'], $orderBy['direction']);
        }
        return $model;
    }
}
