<?php

namespace src\modules\accounts\useCases\updateUserAvatar;

use src\modules\accounts\repositories\UsersRepository;

class UpdateUserAvatarUseCase
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
      $inst = new UpdateUserAvatarUseCase();
    }

    return $inst;
  }


  public function execute($user_id, $avatar_file)
  {
  }
}
