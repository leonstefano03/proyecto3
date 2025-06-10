<?php 

use Src\Service\Domain\DomainCreatorService;


final readonly class DomainPostController {
    private DomainCreatorService $service;

    public function __construct() {
        $this->service = new DomainCreatorService();
    }

    public function start(): void 
    {
        $name = $_POST['name'];
        $code = $_POST['code'];
        
        $this->service->create($name, $code);
        header("Location: /domains");
    }
}
