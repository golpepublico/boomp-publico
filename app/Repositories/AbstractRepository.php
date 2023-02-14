<?php

namespace App\Repositories;

use App\Exceptions\NoDataFoundException;
use Illuminate\Support\Facades\DB;

abstract class AbstractRepository
{
    public $filtersAvailable = [];
    protected $model;

    public function findById(int $id)
    {
        $data = $this->model->find($id);

        if (!$data) {
            throw new NoDataFoundException('Registro não encontrado!');
        }
        return $data;
    }

    public function findBy(array $filters, array $orderBy = [], int $paginate = 0)
    {
        $query = $this->getQuery($filters, $orderBy);
        if ($paginate > 0) {
            return $query->paginate($paginate);
        }
        return $query->get();
    }

    public function getQuery(array $filters, array $orderBy = [])
    {
        $model = $this->model;
        if (count($filters) > 0) {
            foreach ($filters as $filter => $value) {
                $model = $model->where($filter, '=', $value);
            }
        }

        if (count($orderBy) > 0) {
            $model->orderBy($orderBy['field'], $orderBy['sort']);
        }
        return $model;
    }

    public function paginate($qty = 15)
    {
        return $this->model->paginate($qty);
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function insert(array $data)
    {
        return $this->model->insert($data);
    }

    public function update(array $data, int $id)
    {
        $this->validateDataById($id);
        return $this->model->find($id)->update($data);
    }

    public function delete(int $id)
    {
        $this->validateDataById($id);
        return $this->model->find($id)->delete();
    }

    private function validateDataById($id)
    {
        $this->findById($id);
    }
}
