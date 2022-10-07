<?php

namespace src\modules\cars\repositories;

use src\modules\cars\entities\Category;
use core\Model;

class CategoriesRepository extends Model
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

  public function create($name, $description)
  {

    Category::insert([
      'id' => $this->genrerateUUID(),
      'name' => $name,
      'description' => $description
    ])->execute();

    $response = [
      "message" => "Categoria cadastrada com sucesso!"
    ];

    return $response;
  }

  public function list()
  {
    $response = Category::select();

    return $response;
  }

  public function findByName($name)
  {
    $category = Category::select()->where('name', $name)->execute();
    return $category;
  }
}
