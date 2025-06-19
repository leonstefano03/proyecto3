<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';
use Src\Service\Category\CategoriesSearcherService;
final readonly class EntertainmentCreateController extends ViewController {

 private CategoriesSearcherService $categoriesSearcherService;
 
    public function __construct() {
        $this->categoriesSearcherService = new CategoriesSearcherService();
        parent::__construct('Entertainment/admin/form');
    }

    public function start(): void 
    {
        $this->validateUser();
        $categories = $this->categoriesSearcherService->search();

        $data = [
            "categories" => $categories,
        ];

        parent::call($data);
    }
}