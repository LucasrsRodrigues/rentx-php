<?php

namespace src\modules\cars\useCases\createcar;

use core\AppError;
use src\modules\cars\repositories\CarsRepository;

class CreateCarUseCase
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
      $inst = new CreateCarUseCase();
    }

    return $inst;
  }

  public function execute($name, $description, $daily_rate, $license_plate, $fine_amount, $brand, $category_id)
  {

    $carAlreadyExists = $this->carsRepository->findByLicensePlate($license_plate);

    if ($carAlreadyExists) {
      throw new AppError('Car Already Exists', 500);
    }

    $response = $this->carsRepository->create($name, $description, $daily_rate, $license_plate, $fine_amount, $brand, $category_id);

    return $response;
  }
}
