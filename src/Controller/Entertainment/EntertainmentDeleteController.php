<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/SessionController.php';

use Src\Service\Entertainment\EntertainmentDeleterService;

final readonly class EntertainmentDeleteController extends SessionController {
    private EntertainmentDeleterService $service;

    public function __construct() {
        $this->service = new EntertainmentDeleterService();
    }

    public function start(int $id): void 
    {
        $this->validateUser();

        $this->service->delete($id);

        header("Location: /admin/entertainments");
        exit;
    }
}
