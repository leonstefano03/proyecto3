<?php 

use Src\Service\Entertainment\EntertainmentCreatorService;


final readonly class EntertainmentPostController {
    private EntertainmentCreatorService $service;

    public function __construct() {
        $this->service = new EntertainmentCreatorService();
    }

    public function start(): void 
    {
        $type = $_POST['type'];
        $releaseDate = new DateTime($_POST['releaseDate']);
        $isFinal = $_POST['isFinal'];
        $name = $_POST['name'];
        $description = $_POST['description'];
        $categoryId = $_POST['categoryId'];
        

        $this->service->create($type, $releaseDate, $isFinal, $name, $description, $categoryId);
        header("Location: /entertainments");
    }
}
