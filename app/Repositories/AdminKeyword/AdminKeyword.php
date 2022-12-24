<?php 

namespace App\Repositories\AdminKeyword;

use App\Models\Keyword;
use App\Repositories\Repository;

class AdminKeyword extends Repository implements IAdminKeyword
{
  public function getModel()
  {
    return Keyword::class;
  }
}