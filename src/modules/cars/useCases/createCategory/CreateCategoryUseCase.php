<?php

namespace src\modules\cars\useCases\createCategory;

use src\modules\cars\repositories\CategoriesRepository;

class CreateCategoryUseCase
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
      $inst = new CreateCategoryUseCase();
    }

    return $inst;
  }

  public function execute()
  {
    // Service 
    $this->categoriesRepository->create('random', 'batata');
  }
}
