<?php 

namespace Src\Service\Category;

use Src\Entity\Category\Category;
use Src\Model\Category\CategoryModel;

final readonly class CategoriesSearcherService {
    private CategoryModel $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }

    /** @return Category[] */
    public function search(): array
    {
        return $this->categoryModel->search();
    }
}