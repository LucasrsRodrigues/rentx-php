<?php

namespace src\modules\cars\useCases\listCategory;

use core\Controller;
use helper\JWT;

class ListCategoryController extends Controller
{
  private $listCategoryUseCase;

  public function __construct()
  {
    JWT::ensureAuthenticated();
    $this->listCategoryUseCase = ListCategoryUseCase::getInstance();
  }

  public function handle()
  {
    $response = $this->listCategoryUseCase->execute();

    echo $this->returnJson($response);
  }
}
