<?php 

use Src\Service\Category\CategoryFinderService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class CategoryGetController extends ViewController {
    private CategoryFinderService $service;

    public function __construct() {
        $this->service = new CategoryFinderService();
        parent::__construct('Category/detail');
    }

    public function start(int $id): void 
    {
        $category = $this->service->find($id);
        
        $data = [
            "category" => $category,
        ];

        parent::call($data);
    }
}
