<?php

namespace src\modules\cars\useCases\listCategory;

use src\modules\cars\repositories\CategoriesRepository;

class ListCategoryUseCase
{
  private $categoriesRepository;

  public function __construct()
  {
    $this->categoriesRepository = CategoriesRepository::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new ListCategoryUseCase();
    }

    return $inst;
  }

  public function execute()
  {
    $categories = $this->categoriesRepository->list()->execute();

    return $categories;
  }
}
