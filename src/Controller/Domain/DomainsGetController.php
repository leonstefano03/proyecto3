<?php

use Src\Service\Domain\DomainsSearcherService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class DomainsGetController extends ViewController {
    private DomainsSearcherService $service;

    public function __construct() {
        $this->service = new DomainsSearcherService();
        parent::__construct('Domain/list');
    }

    public function start(): void
    {
        $domains = $this->service->search();

        $data = [
            "domains" => $domains
        ];

        parent::call($data);
    }
}