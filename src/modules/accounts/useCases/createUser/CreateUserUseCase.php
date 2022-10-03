<?php

namespace src\modules\accounts\useCases\createUser;

use core\AppError;
use src\modules\accounts\repositories\UsersRepository;

class CreateUserUseCase
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
      $inst = new CreateUserUseCase();
    }

    return $inst;
  }

  public function execute(
    $name,
    $username,
    $password,
    $email,
    $driver_license,
    $isAdmin = false
  ) {
    $userAlreadyExists = $this->userRepository->findByEmail($email);

    if ($userAlreadyExists) {
      throw new AppError('User already Exists!', 500);
    }

    $this->userRepository->create(
      $name,
      $username,
      md5($password),
      $email,
      $driver_license,
      $isAdmin
    );
  }
}
