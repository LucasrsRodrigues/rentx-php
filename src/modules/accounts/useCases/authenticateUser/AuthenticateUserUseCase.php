<?php

namespace src\modules\accounts\useCases\authenticateUser;

use core\AppError;
use helper\JWT;
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

    $passwordMath = md5($password) == $user['password'];


    if (!$passwordMath) {
      throw new AppError('Email or password incorrect!');
    }

    $jwt = new JWT();

    $token = $jwt->create([
      "user_id" => $user['id']
    ]);

    unset($user['password']);

    $response = array(
      "user" => $user,
      "token" => $token
    );

    return $response;
  }
}
