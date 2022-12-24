<?php

namespace App\Repositories;

abstract class Repository implements IRepository
{
  protected $model;

  public function __construct()
  {
    $this->setModel();
  }

  public function setModel()
  {
    $this->model = app()->make(
      $this->getModel()
    );
  }

  public abstract function getModel();

  public function all()
  {
    return $this->model->all();
  }

  public function find($id)
  {
    return $this->model->find($id);
  }

  public function create(array $data)
  {
    return $this->model->create($data);
  }

  public function update(array $data, $id)
  {
    $query = $this->model->find($id)->update($data);

    return $query;
  }

  public function paginate($number)
  {
    return $this->model->paginate($number);
  }

  public function delete($id)
  {
    $query = $this->model->find($id);

    if ($query) {
      $query->delete();

      return true;
    }
    return false;
  }
}
