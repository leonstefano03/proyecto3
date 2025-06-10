<?php

use Src\Service\Entertainment\EntertainmentsSearcherService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class EntertainmentsGetController extends ViewController {
    private EntertainmentsSearcherService $service;

    public function __construct() {
        $this->service = new EntertainmentsSearcherService();
        parent::__construct('Entertainment/list');
    }

    public function start(): void
    {
        $entertainment = $this->service->search();

        $data = [
            "entertainments" => $entertainment
        ];

        parent::call($data);
    }
}