<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/ViewController.php';
use src\Service\Comment\CommentFinderService;
final readonly class CommentGetController extends ViewController
{
    private CommentFinderService $service;

    public function __construct()
    {
      $this->service = new CommentFinderService();
      parent::__construct('Comment/detail');
    }

    public function start(int $id): void
    {
       
      $comment = $this->service->find($id);

      $data = [
          "comment" => $comment,
      ];

      parent::call($data);
    }
}