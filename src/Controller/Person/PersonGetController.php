<?php 

use Src\Service\Person\PersonFinderService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class PersonGetController extends ViewController {
    private PersonFinderService $service;

    public function __construct() {
        $this->service = new PersonFinderService();
        parent::__construct('Person/detail');
    }

    public function start(int $id): void 
    {
        $person = $this->service->find($id);
        
        $data = [
            "person" => $person,
        ];

        parent::call($data);
    }
}
