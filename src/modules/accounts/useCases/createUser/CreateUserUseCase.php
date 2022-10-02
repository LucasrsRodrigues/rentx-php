<?php

namespace src\modules\accounts\useCases\createUser;

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

    echo  $name;
    echo '<br/>';
    echo  $username;
    echo '<br/>';
    echo  $password;
    echo '<br/>';
    echo  $email;
    echo '<br/>';
    echo  $driver_license;
    echo '<br/>';
    echo  $isAdmin;
  }
}
