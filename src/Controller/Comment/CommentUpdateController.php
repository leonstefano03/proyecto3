<?php 

include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/ViewController.php';

use Src\Service\Comment\CommentFinderService;

final readonly class CommentUpdateController extends ViewController {
    private CommentFinderService $commentFinderService;

    public function __construct() {
        $this->commentFinderService = new CommentFinderService();

        parent::__construct('Comment/admin/update_form'); // Asegurate que exista la vista
    }

    public function start(int $id): void 
    {
        $this->validateUser();
        $comment = $this->commentFinderService->find($id);

        $data = [
            "comment" => $comment,
        ];

        parent::call($data);
    }
}
