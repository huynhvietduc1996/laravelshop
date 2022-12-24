<?php 

namespace App\Repositories\AdminCategory;

use App\Models\Category;
use App\Repositories\Repository;

class AdminCategory extends Repository implements IAdminCategory
{
  public function getModel()
  {
    return Category::class;
  }
}