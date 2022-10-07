<?php

namespace src\modules\cars\repositories;

use core\Model;
use src\modules\cars\entities\Car;

class CarsRepository extends Model
{

  public function __construct()
  {
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new CarsRepository();
    }

    return $inst;
  }

  public function create($name, $description, $daily_rate, $license_plate, $fine_amount, $brand, $category_id)
  {
    Car::insert([
      "id" => $this->genrerateUUID(),
      "name" => $name,
      "description" => $description,
      "daily_rate" => $daily_rate,
      "license_plate" => $license_plate,
      "fine_amount" => $fine_amount,
      "brand" => $brand,
      "category_id" => $category_id,
    ])->execute();

    $response = [
      "message" => "Carro cadastrado com sucesso!"
    ];

    return $response;
  }

  public function findByLicensePlate($license_plate)
  {
    $car = Car::select()->where('license_plate', $license_plate)->execute();
    return $car;
  }

  public function findAvailable(string $brand = null, string $category_id = null, string $name = null)
  {
    $car = Car::select()->where('available', 1);

    if ($brand) {
      $car->where('brand', $brand);
    }

    if ($category_id) {
      $car->where('category_id', $category_id);
    }

    if ($name) {
      $car->where('name', $name);
    }

    $response = $car->execute();

    return $response;
  }
}
