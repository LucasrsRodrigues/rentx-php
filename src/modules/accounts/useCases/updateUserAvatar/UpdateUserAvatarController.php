<?php

namespace src\modules\accounts\useCases\updateUserAvatar;

use core\AppError;
use core\Controller;

class UpdateUserAvatarController extends Controller
{
  private $updateAvatarUseCase;

  public function __construct()
  {
    $this->updateAvatarUseCase = UpdateUserAvatarUseCase::getInstance();
  }

  public static function getInstance()
  {
    static $inst = null;

    if ($inst === null) {
      $inst = new UpdateUserAvatarController();
    }

    return $inst;
  }

  public function handle()
  {
    $avatar_file = null;
    $user_id = filter_input_array(INPUT_POST, FILTER_DEFAULT)['user_id'];
    $formatos_permitidos = array('png', 'jpeg', 'jpg');
    $file = $_FILES['avatar_file'];

    $extensao = pathinfo($file['name'], PATHINFO_EXTENSION);

    if (!in_array($extensao, $formatos_permitidos)) {
      throw new AppError('Formato não permitido!');
    }

    $pasta = '/tmp/avatar';

    $temporario = $file['tmp_name'];

    echo $temporario;
    exit;
    $novo_nome = $user_id . ".$extensao";

    if (move_uploaded_file($temporario, $pasta . $novo_nome)) {
      echo $this->returnJson(['upload feito com sucesso!'], 201);
    }
    // $response = $this->updateAvatarUseCase->execute($user_id, $avatar_file);

    // echo $this->returnJson($response, 201);
  }
}
