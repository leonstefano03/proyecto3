<?php 

declare(strict_types = 1);

namespace Src\Service\Entertainment;

use Src\Model\Entertainment\EntertainmentModel;
use Src\Entity\Entertainment\Entertainment;
// use Src\Entity\Entertainment\Exception\EntertainmentNotFoundException;

final readonly class EntertainmentFinderService {

    private EntertainmentModel $model;

    public function __construct() 
    {
        $this->model = new EntertainmentModel();
    }

    public function find(int $id): Entertainment 
    {
        $entertainment = $this->model->find($id);

        // if ($entertainment === null) {
        //     throw new EntertainmentNotFoundException($id);
        // }

        return $entertainment;
    }

}
