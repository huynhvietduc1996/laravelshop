<?php

namespace App\Repositories;

interface IRepository
{
  public function all();

  public function create(array $data);

  public function update(array $data, $id);

  public function delete($id);

  public function find($id);

  public function paginate($number);
}
