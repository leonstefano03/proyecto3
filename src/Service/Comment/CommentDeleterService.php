<?php 

declare(strict_types = 1);

namespace Src\Service\Comment;

use Src\Model\Comment\CommentModel;
use Src\Entity\Comment\Comment;

final readonly class CommentDeleterService {

    private CommentModel $model;

    public function __construct() 
    {
        $this->model = new CommentModel();
    }

    public function delete(int $id): void 
    {
        $this->model->delete($id);
    }

}

