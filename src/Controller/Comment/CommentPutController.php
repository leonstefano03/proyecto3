<?php 
include_once $_SERVER["DOCUMENT_ROOT"] . '/src/Controller/SessionController.php';

use Src\Service\Comment\CommentUpdaterService;
use Src\Service\Comment\CommentFinderService;

final readonly class CommentPutController extends SessionController {
    private CommentUpdaterService $updaterService;
    private CommentFinderService $finderService;

    public function __construct() {
        $this->updaterService = new CommentUpdaterService();
        $this->finderService = new CommentFinderService();
    }

    public function start(int $id): void 
    {
        $this->validateUser();

        // Buscar el comentario existente
        // $comment = $this->finderService->find($id);

        // Recolectar datos del formulario
        $author = trim($_POST['author']) ?: 'Anónimo';
        $content = $_POST['content'];
        $entertainmentId = (int)$_POST['entertainmentId'];

        // Llamar al servicio para actualizar el comentario
        $this->updaterService->update($id, $entertainmentId, $author, $content);

        header("Location: /entertainments/$entertainmentId");
    }
}
