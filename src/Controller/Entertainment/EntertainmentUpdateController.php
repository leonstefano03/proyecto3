<?php 

use Src\Service\Entertainment\EntertainmentFinderService;

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class EntertainmentUpdateController extends ViewController {
    private EntertainmentFinderService $service;

    public function __construct() {
        $this->service = new EntertainmentFinderService();
        parent::__construct('Entertainment/admin/update_form');
    }

    public function start(int $id): void 
    {
        $entertainment = $this->service->find($id);
        
        $data = [
            "entertainment" => $entertainment,
        ];

        parent::call($data);
    }
}
