<?php

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

use Src\Service\Comment\CommentsSearcherService;

final readonly class CommentsGetController extends ViewController {
    private CommentsSearcherService $service;

    public function __construct() {
        $this->service = new CommentsSearcherService();
        parent::__construct('Comment/list');
    }

    public function start(): void
    {
        $comments = $this->service->search();

        $data = [
            "comments" => $comments,
        ];

        parent::call($data);
    }
}