<?php

namespace src\modules\cars\useCases\createcar;

use \core\Controller;
use helper\JWT;

class CreateCarController extends Controller
{
  private $createCarUseCase;

  public function __construct()
  {
    JWT::ensureAuthenticated(true);
    $this->createCarUseCase = CreateCarUseCase::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new CreateCarController();
    }

    return $inst;
  }

  public function handle()
  {
    $data = $this->getData();
    extract($data);

    $response = $this->createCarUseCase->execute(
      $name,
      $description,
      $daily_rate,
      $license_plate,
      $fine_amount,
      $brand,
      $category_id
    );

    echo $this->returnJson($response);
  }
}
