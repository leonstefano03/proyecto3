<?php 

use Src\Service\Category\CategoryUpdaterService;


final readonly class CategoryPutController {
    private CategoryUpdaterService $service;

    public function __construct() {
        $this->service = new CategoryUpdaterService();
    }

    public function start($id): void 
    {
        $name = $_POST['name'];
        
        $this->service->update($id, $name);
        header("Location: /categories");
    }
}
