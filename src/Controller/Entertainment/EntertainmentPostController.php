<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/SessionController.php';

use Src\Service\Entertainment\EntertainmentCreatorService;


final readonly class EntertainmentPostController extends SessionController {
    private EntertainmentCreatorService $service;

    public function __construct() {
        $this->service = new EntertainmentCreatorService();
    }

    public function start(): void 
    {
        $this->validateUser();
        $type = $_POST['type'];
        $releaseDate = new DateTime($_POST['releaseDate']);
        $isFinal = isset($_POST['isFinal']) && $_POST['isFinal'] !== '' ? (int)$_POST['isFinal'] : 1;
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];
        

        $this->service->create($type, $releaseDate, $isFinal, $name, $description, $categoryId);
        header("Location: /entertainments");
    }
}
