<?php 

namespace Src\Service\Comment;

use Src\Entity\Comment\Comment;
use Src\Model\Comment\CommentModel;

final readonly class CommentsSearcherService {
    private CommentModel $commentModel;

    public function __construct() {
        $this->commentModel = new CommentModel();
    }

    /** @return Comment[] */
    public function search(): array
    {
        return $this->commentModel->search();
    }

    /** @return Comment[] */
    public function findByEntertainment(int $entertainmentId): array 
    {
        return $this->commentModel->findByEntertainment($entertainmentId);
    }
}
