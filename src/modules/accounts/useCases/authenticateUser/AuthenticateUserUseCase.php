<?php

namespace src\modules\accounts\useCases\authenticateUser;

use core\AppError;
use src\modules\accounts\repositories\UsersRepository;

class AuthenticateUserUseCase
{
  private $userRepository;

  public function __construct()
  {
    $this->userRepository = UsersRepository::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new AuthenticateUserUseCase();
    }

    return $inst;
  }

  public function execute($email, $password)
  {
    // usuario existe
    $user = $this->userRepository->findByEmail($email);

    if (!$user) {
      throw new AppError('Email or password incorrect!');
    }

    $passwordMath = md5($password) == $user['passowrd'];

    if (!$passwordMath) {
      throw new AppError('Email or password incorrect!');
    }

    // $token = 
    // senha correta
    // gerar token
  }
}
