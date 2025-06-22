<?php 

include_once $_SERVER["DOCUMENT_ROOT"].'/src/Controller/ViewController.php';

use Src\Service\Entertainment\EntertainmentFinderService;
use Src\Service\Category\CategoriesSearcherService;
use Src\Service\Comment\CommentsSearcherService;

final readonly class EntertainmentUpdateController extends ViewController {
    private EntertainmentFinderService $service;
    private CategoriesSearcherService $categoriesSearcherService;
    private CommentsSearcherService $commentsSearcherService;

    public function __construct() {
        $this->service = new EntertainmentFinderService();
        $this->categoriesSearcherService = new CategoriesSearcherService();
        $this->commentsSearcherService = new CommentsSearcherService();

        parent::__construct('Entertainment/admin/update_form');
    }

    public function start(int $id): void 
    {
        $this->validateUser();
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
