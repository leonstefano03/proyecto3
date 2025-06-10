<?php

use Src\Service\Category\CategoriesSearcherService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class CategoriesGetController extends ViewController {
    private CategoriesSearcherService $service;

    public function __construct() {
        $this->service = new CategoriesSearcherService();
        parent::__construct('Category/list');
    }

    public function start(): void
    {
        $categories = $this->service->search();

        $data = [
            "categories" => $categories
        ];

        parent::call($data);
    }
}