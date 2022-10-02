<?php

namespace src\modules\cars\useCases\listCategory;

use core\Controller;

class ListCategoryController extends Controller
{
  private $listCategoryUseCase;

  public function __construct()
  {
    $this->listCategoryUseCase = ListCategoryUseCase::getInstance();
  }

  public function handle()
  {
    $response = $this->listCategoryUseCase->execute();

    echo $this->returnJson($response);
  }
}
