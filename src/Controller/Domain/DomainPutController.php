<?php 

use Src\Service\Domain\DomainUpdaterService;


final readonly class DomainPutController {
    private DomainUpdaterService $service;

    public function __construct() {
        $this->service = new DomainUpdaterService();
    }

    public function start($id): void 
    {
        $name = $_POST['name'];
        $code = $_POST['code'];
        
        $this->service->update($id, $name, $code);
        header("Location: /domains");
    }
}
