<?php 

use Src\Service\Category\CategoryFinderService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class CategoryUpdateController extends ViewController {
    private CategoryFinderService $service;

    public function __construct() {
        $this->service = new CategoryFinderService();
        parent::__construct('Category/admin/update_form');
    }

    public function start(int $id): void 
    {
        $this->validateUser();
        $category = $this->service->find($id);
        
        $data = [
            "category" => $category,
        ];

        parent::call($data);
    }
}
