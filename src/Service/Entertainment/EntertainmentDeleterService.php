<?php 

declare(strict_types = 1);

namespace Src\Service\Entertainment;

use Src\Model\Entertainment\EntertainmentModel;
use Src\Entity\Entertainment\Entertainment;

final readonly class EntertainmentDeleterService {

    private EntertainmentModel $model;

    public function __construct() 
    {
        $this->model = new EntertainmentModel();
    }

    public function delete(int $id): void 
    {
        $this->model->delete($id);
    }

}

