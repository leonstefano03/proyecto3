<?php 

declare(strict_types = 1);

namespace Src\Service\Comment;

use Src\Model\Comment\CommentModel;
use Src\Entity\Comment\Comment;

final readonly class CommentUpdaterService {

    private CommentModel $model;
    private CommentFinderService $finder;

    public function __construct() 
    {
        $this->model = new CommentModel();
        $this->finder = new CommentFinderService();
    }

    public function update(int $id, string $author, string $content, int $entertainmentId): void 
    {
        $comment = $this->finder->find($id);
        $comment->modify($entertainmentId, $author, $content);
        $this->model->update($comment);
    }

}
