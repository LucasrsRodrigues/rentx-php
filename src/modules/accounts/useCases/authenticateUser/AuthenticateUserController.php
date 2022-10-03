<?php


namespace src\modules\accounts\useCases\authenticateUser;

use core\Controller;

class AuthenticateUserController extends Controller
{
  private $authenticateUserUseCase;

  public function __construct()
  {
    $this->authenticateUserUseCase = AuthenticateUserUseCase::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new AuthenticateUserController();
    }

    return $inst;
  }

  public function handle()
  {
    $data = $this->getData();

    $token = $this->authenticateUserUseCase->execute($data['email'], $data['password']);

    echo $this->returnJson($token);
  }
}
