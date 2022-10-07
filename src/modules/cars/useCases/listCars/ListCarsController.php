<?php

namespace src\modules\cars\useCases\listCars;

use core\Controller;
use helper\JWT;

class ListCarsController extends Controller
{
  private $listCarsUseCase;

  public function __construct()
  {
    JWT::ensureAuthenticated();
    $this->listCarsUseCase = ListCarsUseCase::getInstance();
  }

  public function handle()
  {
    $response = $this->listCarsUseCase->execute();

    echo $this->returnJson($response);
  }
}
