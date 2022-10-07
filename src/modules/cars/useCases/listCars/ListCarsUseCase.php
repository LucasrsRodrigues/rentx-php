<?php

namespace src\modules\cars\useCases\listCars;

use src\modules\cars\repositories\CarsRepository;

class ListCarsUseCase
{
  private $carsRepository;

  public function __construct()
  {
    $this->carsRepository = CarsRepository::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new ListCarsUseCase();
    }

    return $inst;
  }

  public function execute()
  {

    $response = $this->carsRepository->findAvailable();
    return $response;
  }
}
