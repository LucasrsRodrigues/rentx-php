<?php

namespace src\modules\cars\repositories;

class CategoriesRepository
{
  public function __construct()
  {
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new CategoriesRepository();
    }

    return $inst;
  }

  public function create($description, $name)
  {
    echo $description;
    echo '<br />';
    echo $name;
  }
}
