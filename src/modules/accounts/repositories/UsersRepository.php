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

  public function create($name, $username, $password, $email, $driver_license)
  {
    $response = User::insert([
      'id' => $this->genrerateUUID(),
      'name' => $name,
      'username' => $username,
      'password' => $password,
      'email' => $email,
      'driver_license' => $driver_license,
    ])->execute();

    return 'Criado com sucesso!';
  }

  public function findByEmail($email)
  {
    $user = User::select()->where('email', $email)->execute();
    return $user[0];
  }

  public function findById($id)
  {
    $user = User::select()->where('id', $id)->execute();

    return $user[0];
  }
}
