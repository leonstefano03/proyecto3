<?php 

declare(strict_types = 1);

namespace Src\Service\Category;

use Src\Model\Category\CategoryModel;
use Src\Entity\Category\Category;

final readonly class CategoryDeleterService {

    private CategoryModel $model;

    public function __construct() 
    {
        $this->model = new CategoryModel();
    }

    public function delete(int $id): void 
    {
        $this->model->delete($id);
    }

}

