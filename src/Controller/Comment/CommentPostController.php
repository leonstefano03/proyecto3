<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/SessionController.php';
use Src\Service\Comment\CommentCreatorService;

final readonly class CommentPostController extends SessionController {
    private CommentCreatorService $service;

    public function __construct() {
        $this->service = new CommentCreatorService();
    }

    public function start(): void 
    {
        $entertainmentId = (int)$_POST['entertainmentId'];
        $author = trim($_POST['author']);
        $content = trim($_POST['content']);

        if ($content === '') {
            //mensaje de error evitar vacíos
            header("Location: /entertainments/$entertainmentId?error=empty");
            exit;
        }

        $this->service->create($entertainmentId, $author, $content);

        header("Location: /entertainments/$entertainmentId");
    }
}
