<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/SessionController.php';

use Src\Service\Category\CategoryUpdaterService;


final readonly class CategoryPutController extends SessionController {
    private CategoryUpdaterService $service;

    public function __construct() {
        $this->service = new CategoryUpdaterService();
    }

    public function start($id): void 
    {
        $this->validateUser();
        $name = $_POST['name'];
        
        $this->service->update($id, $name);
        header("Location: /admin/categories");
    }
}
