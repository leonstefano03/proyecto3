<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';
use Src\Service\Entertainment\EntertainmentsSearcherService;


final readonly class EntertainmentsAdminController extends ViewController {
    private EntertainmentsSearcherService $service;

    public function __construct() {
        $this->service = new EntertainmentsSearcherService();
        parent::__construct('Entertainment/admin/index');
    }

    public function start(): void
    {
        $this->validateUser();

        $entertainment = $this->service->search();

        $data = [
            "entertainments" => $entertainment
        ];

        parent::call($data);
    }
}