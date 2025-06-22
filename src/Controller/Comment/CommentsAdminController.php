<?php

include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/ViewController.php';

use Src\Service\Comment\CommentsSearcherService;

final readonly class CommentsAdminController extends ViewController {
    private CommentsSearcherService $commentService;

    public function __construct() {
        $this->commentService = new CommentsSearcherService();

        parent::__construct('Comment/admin/index');
    }

    public function start(): void
    {
        $this->validateUser();

        $comments = $this->commentService->search();

        $data = [
            "comments" => $comments,
        ];

        parent::call($data);
    }
}
