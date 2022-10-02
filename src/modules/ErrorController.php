<?php

namespace src\modules;

use core\AppError;
use \core\Controller;

class ErrorController extends Controller
{

    public function __construct()
    {
        new AppError('Rota não encontrada', 404);
    }
}
