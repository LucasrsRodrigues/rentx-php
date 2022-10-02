<?php

namespace src\modules\cars\useCases\createCategory;

use \core\Controller;

class CreateCategoryController extends Controller
{
    private $createCategoryUseCase;

    public function __construct()
    {
        $this->createCategoryUseCase = CreateCategoryUseCase::getInstance();
    }

    public static function getInstance()
    {
        static $inst = null;

        if ($inst === null) {
            $inst = new CreateCategoryController();
        }

        return $inst;
    }

    public function handle()
    {
        $data = json_decode(file_get_contents("php://input"));
        $array = json_decode(json_encode($data), true);

        $response = $this->createCategoryUseCase->execute($array['name'], $array['description']);

        echo $this->returnJson($response, 201);
    }
}
