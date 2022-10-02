<?php

namespace core;

use ErrorException;
use \Exception;

class AppError extends Exception
{
  public function __construct(string $string, int $codeError = 400)
  {
    http_response_code($codeError);
    throw new ErrorException($string);
  }
}
