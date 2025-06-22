<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/SessionController.php';

use Src\Service\Comment\CommentDeleterService;
use src\Service\Comment\CommentFinderService;


final readonly class CommentDeleteController extends SessionController {
    private CommentDeleterService $service;
    private CommentFinderService $commentFinderService;

    public function __construct() {
        $this->service = new CommentDeleterService();      
        $this->commentFinderService = new CommentFinderService();

    }

    public function start(int $id): void 
    {
        $this->validateUser();
      
        $comment = $this->commentFinderService->find($id);

        $this->service->delete($id);

        header("Location: /admin/entertainments/update/". $comment->entertainmentId());
        exit;
    }
}
