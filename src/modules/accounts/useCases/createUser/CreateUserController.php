<?php

namespace src\modules\accounts\useCases\createUser;

use core\Controller;

class CreateUserController extends Controller
{
  private $createUserUseCase;

  public function __construct()
  {
    $this->createUserUseCase = CreateUserUseCase::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new CreateUserController();
    }

    return $inst;
  }

  public function handle()
  {

    $data = $this->getData();
    extract($data);

    $response = $this->createUserUseCase->execute(
      $name,
      $username,
      $password,
      $email,
      $driver_license,
    );

    echo $this->returnJson($response, 201);
  }
}
