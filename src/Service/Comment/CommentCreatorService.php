<?php 

declare(strict_types = 1);

namespace Src\Service\Comment;

use Src\Model\Comment\CommentModel;
use Src\Entity\Comment\Comment;
use DateTime;

final readonly class CommentCreatorService {

    private CommentModel $model;

    public function __construct() 
    {
        $this->model = new CommentModel();
    }

    public function create(int $entertainmentId, string $author, string $content): void 
    {
        $comment = Comment::create($entertainmentId, $author, $content, new DateTime());
        $this->model->insert($comment);
    }
}
