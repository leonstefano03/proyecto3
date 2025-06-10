<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class CategoryCreateController extends ViewController {

    public function __construct() {
        parent::__construct('Category/admin/form');
    }

    public function start(): void 
    {
        $this->validateUser();
        parent::call([]);
    }
}