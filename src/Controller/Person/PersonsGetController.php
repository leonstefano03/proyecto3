<?php

use Src\Service\Person\PersonsSearcherService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class PersonsGetController extends ViewController {
    private PersonsSearcherService $service;

    public function __construct() {
        $this->service = new PersonsSearcherService();
        parent::__construct('Person/list');
    }

    public function start(): void
    {
        $persons = $this->service->search();

        $data = [
            "persons" => $persons
        ];

        parent::call($data);
    }
}