<?php

namespace helper;

use core\AppError;
use src\Config;
use src\modules\accounts\entities\User;
use src\modules\accounts\repositories\UsersRepository;

class JWT
{

  public function create($data)
  {
    $header = json_encode(array(
      "typ" => "JWT",
      "alg" => "HS256"
    ));

    $payload = json_encode($data);

    $hbase = $this->base64url_encode($header);
    $pbase = $this->base64url_encode($payload);

    $signature = hash_hmac("sha256", $hbase . "." . $pbase, Config::JWT_TOKEN, true);
    $bsig = $this->base64url_encode($signature);

    $jwt = $hbase . "." . $pbase . "." . $bsig;

    return $jwt;
  }


  public static function ensureAuthenticated($isAdmin = false)
  {
    $apache_headers = apache_request_headers();

    if (!isset($apache_headers['Authorization'])) {
      throw new AppError('Token missing');
    }

    $token = explode(' ', $apache_headers['Authorization'])[1];
    $data_token = self::validate($token);

    $usersRepository = new UsersRepository();

    $exists = $usersRepository->findById($data_token->user_id);

    if (!$exists) {
      throw new AppError('User does not exists!');
    }

    if ($isAdmin && $exists['isAdmin'] !== "1") {
      throw new AppError("User isn't admin!");
    }

    return true;
  }

  public static function validate($token)
  {
    $array = array();

    $jwt_split = explode('.', $token);

    if (count($jwt_split) !== 3) {
      throw new AppError('Token Invalid!');
    }

    $signature = hash_hmac("sha256", $jwt_split[0] . "." . $jwt_split[1], Config::JWT_TOKEN, true);
    $bsig = self::base64url_encode($signature);

    if ($bsig !== $jwt_split[2]) {
      throw new AppError('Token Invalid!');
    }

    $array = json_decode(self::base64url_decode($jwt_split[1]));

    return $array;
  }


  private static function base64url_encode($data)
  {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
  }

  private static function base64url_decode($data)
  {
    return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
  }
}
