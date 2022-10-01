<?php

namespace src\modules\cars\useCases\createCategory;

class CreateCategoryUseCase
{
  public function __construct()
  {
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
  }
}
