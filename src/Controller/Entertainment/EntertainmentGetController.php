<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/ViewController.php';
use src\Service\Entertainment\EntertainmentFinderService;
use Src\Service\Category\CategoriesSearcherService;
use Src\Service\Comment\CommentsSearcherService;
final readonly class EntertainmentGetController extends ViewController
{
    private EntertainmentFinderService $service;
    private CategoriesSearcherService $categoriesSearcherService;
    private CommentsSearcherService $commentsSearcherService;

    public function __construct()
    {
      $this->service = new EntertainmentFinderService();
      $this->categoriesSearcherService = new CategoriesSearcherService();
      $this->commentsSearcherService = new CommentsSearcherService();
      parent::__construct('Entertainment/detail');
    }

    public function start(int $id): void
    {
       
      $entertainment = $this->service->find($id);
      $categories = $this->categoriesSearcherService->search();
      $comments = $this->commentsSearcherService->findByEntertainment($id);

      $data = [
          "entertainment" => $entertainment,
          "categories" => $categories,
          "comments" => $comments,
      ];

      parent::call($data);
    }
}