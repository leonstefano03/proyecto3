<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/src/Controller/ViewController.php';
use src\Service\Entertainment\EntertainmentFinderService;
use Src\Service\Category\CategoriesSearcherService;
final readonly class EntertainmentGetController extends ViewController
{
    private EntertainmentFinderService $service;
    private CategoriesSearcherService $categoriesSearcherService;

    public function __construct()
    {
      $this->service = new EntertainmentFinderService();
      $this->categoriesSearcherService = new CategoriesSearcherService();
      parent::__construct('Entertainment/detail');
    }

    public function start(int $id): void
    {
       
      $entertainment = $this->service->find($id);
      $categories = $this->categoriesSearcherService->search();

      $data = [
          "entertainment" => $entertainment,
          "categories" => $categories,
      ];

      parent::call($data);
    }
}