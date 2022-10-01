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

        $data = $this->getData();

        echo $data['name'];
    }
}
