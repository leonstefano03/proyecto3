<?php 

namespace Src\Service\Entertainment;

use Src\Entity\Entertainment\Entertainment;
use Src\Model\Entertainment\EntertainmentModel;

final readonly class EntertainmentsSearcherService {
    private EntertainmentModel $entertainmentModel;

    public function __construct() {
        $this->entertainmentModel = new EntertainmentModel();
    }

    /** @return Entertainment[] */
    public function search(): array
    {
        return $this->entertainmentModel->search();
    }
}