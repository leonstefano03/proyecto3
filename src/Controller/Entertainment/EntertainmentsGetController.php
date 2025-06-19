<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

use Src\Service\Entertainment\EntertainmentsSearcherService;
use Src\Service\Category\CategoriesSearcherService;

final readonly class EntertainmentsGetController extends ViewController {
    private EntertainmentsSearcherService $service;
    private CategoriesSearcherService $categoriesSearcherService;

    public function __construct() {
        $this->service = new EntertainmentsSearcherService();
        $this->categoriesSearcherService = new CategoriesSearcherService();
        parent::__construct('Entertainment/list');
    }

    public function start(): void
    {
        $entertainments = $this->service->search();
        $categories = $this->categoriesSearcherService->search();

        $data = [
            "entertainments" => $entertainments,
            "categories" => $categories,
        ];

        parent::call($data);
    }
}