<?php 
include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';
final readonly class CommentCreateController extends ViewController {
 
    public function __construct() {
        parent::__construct('Comment/admin/form');
    }

    public function start(): void 
    {
        parent::call([]);
    }
}