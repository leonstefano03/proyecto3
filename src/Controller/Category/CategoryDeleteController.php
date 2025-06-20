<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/SessionController.php';

use Src\Service\Category\CategoryDeleterService;

final readonly class CategoryDeleteController extends SessionController {
    private CategoryDeleterService $service;

    public function __construct() {
        $this->service = new CategoryDeleterService();
    }

    public function start(int $id): void 
    {
        $this->validateUser();

        $this->service->delete($id);

        header("Location: /admin/categories");
        exit;
    }
}
