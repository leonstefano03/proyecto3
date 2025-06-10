<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

final readonly class AdminLoginViewController extends ViewController {

    public function __construct() {
        parent::__construct('Admin/login');
    }

    public function start(): void
    {
        parent::call([]);
    }
}