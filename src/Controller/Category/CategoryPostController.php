<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/SessionController.php';

use Src\Service\Category\CategoryCreatorService;


final readonly class CategoryPostController extends SessionController {
    private CategoryCreatorService $service;

    public function __construct() {
        $this->service = new CategoryCreatorService();
    }

    public function start(): void 
    {
        $this->validateUser();
        $name = $_POST['name'];
        
        $this->service->create($name);
        header("Location: /categories");
    }
}
