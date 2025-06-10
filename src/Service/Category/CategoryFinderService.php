<?php 

declare(strict_types = 1);

namespace Src\Service\Category;

use Src\Model\Category\CategoryModel;
use Src\Entity\Category\Category;
use Src\Entity\Category\Exception\CategoryNotFoundException;

final readonly class CategoryFinderService {

    private CategoryModel $model;

    public function __construct() 
    {
        $this->model = new CategoryModel();
    }

    public function find(int $id): Category 
    {
        $category = $this->model->find($id);

        if ($category === null) {
            throw new CategoryNotFoundException($id);
        }

        return $category;
    }

}

