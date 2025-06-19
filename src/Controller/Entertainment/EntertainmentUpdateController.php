<?php 

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

use Src\Service\Entertainment\EntertainmentFinderService;
use Src\Service\Category\CategoriesSearcherService;

final readonly class EntertainmentUpdateController extends ViewController {
    private EntertainmentFinderService $service;
    private CategoriesSearcherService $categoriesSearcherService;

    public function __construct() {
        $this->service = new EntertainmentFinderService();
        $this->categoriesSearcherService = new CategoriesSearcherService();
        parent::__construct('Entertainment/admin/update_form');
    }

    public function start(int $id): void 
    {
        $this->validateUser();
        $entertainment = $this->service->find($id);
        $categories = $this->categoriesSearcherService->search();
        $data = [
            "entertainment" => $entertainment,
            "categories" => $categories,

        ];

        parent::call($data);
    }
}
