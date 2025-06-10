<?php 

declare(strict_types = 1);

namespace Src\Service\Category;

use Src\Model\Category\CategoryModel;
use Src\Entity\Category\Category;

final readonly class CategoryUpdaterService {

    private CategoryModel $model;
    private CategoryFinderService $finder;
    public function __construct() 
    {
        $this->model = new CategoryModel();
        $this->finder = new CategoryFinderService();
    }

    public function update(int $id, string $name): void 
    {
        $category = $this->finder->find($id);
        $category->modify($name);
        $this->model->update($category);
    }

}

