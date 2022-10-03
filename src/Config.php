<?php

namespace src;

class Config
{
    const BASE_DIR = '/rentx/public';

    const DB_DRIVER = 'mysql';
    const DB_HOST = 'localhost';
    const DB_DATABASE = 'rentx';
    const DB_USER = 'root';
    const DB_PASS = '';

    const JWT_TOKEN = '1fea01fd3292089d3b5f54ec32c35087';

    const ERROR_CONTROLLER = 'ErrorController';
    const DEFAULT_ACTION = 'index';
}
