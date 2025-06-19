<?php

use Src\Service\Category\CategoriesSearcherService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class CategoriesAdminController extends ViewController {
    private CategoriesSearcherService $service;

    public function __construct() {
        $this->service = new CategoriesSearcherService();
        parent::__construct('Category/admin/index');
    }

    public function start(): void
    {
        $this->validateUser();
        $categories = $this->service->search();

        $data = [
            "categories" => $categories
        ];

        parent::call($data);
    }
}