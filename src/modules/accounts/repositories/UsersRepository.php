<?php

namespace src\modules\accounts\repositories;

use core\Model;
use src\modules\accounts\entities\User;

class UsersRepository extends Model
{
  public function __construct()
  {
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new UsersRepository();
    }

    return $inst;
  }

  public function create($name, $username, $password, $email, $driver_license, $isAdmin = false)
  {
    $response = User::insert([
      'id' => $this->genrerateUUID(),
      'name' => $name,
      'username' => $username,
      'password' => $password,
      'email' => $email,
      'driver_license' => $driver_license,
      'isAdmin' => $isAdmin
    ])->execute();

    return $response;
  }

  public function findByEmail($email)
  {
    $user = User::select()->where('email', $email)->execute();

    return $user[0];
  }
}
