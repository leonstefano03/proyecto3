<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/SessionController.php';

use Src\Service\Entertainment\EntertainmentUpdaterService;


final readonly class EntertainmentPutController extends SessionController {
    private EntertainmentUpdaterService $service;

    public function __construct() {
        $this->service = new EntertainmentUpdaterService();
    }

    public function start($id): void 
    {
        $this->validateUser();
        $type = $_POST['type'];
        $releaseDate = new DateTime($_POST['releaseDate']);
        $isFinal = $_POST['isFinal'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];
        
        $this->service->update($id, $type, $releaseDate, $isFinal, $name, $description, $categoryId);
        header("Location: /entertainments");
    }
}
