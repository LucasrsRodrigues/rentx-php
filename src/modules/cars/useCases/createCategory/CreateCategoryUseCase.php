<?php

namespace src\modules\cars\useCases\createCategory;

use core\AppError;
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

  public function execute($name, $description)
  {
    // Service 
    $categoryAlreadyExists = $this->categoriesRepository->findByName($name);

    if ($categoryAlreadyExists) {
      throw new AppError('Category Already Exists!', 500);
    }

    $this->categoriesRepository->create($name, $description);
  }
}
