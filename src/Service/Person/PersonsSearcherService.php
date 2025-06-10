<?php 

namespace Src\Service\Person;

use Src\Entity\Person\Person;
use Src\Model\Person\PersonModel;

final readonly class PersonsSearcherService {
    private PersonModel $personModel;

    public function __construct() {
        $this->personModel = new PersonModel();
    }

    /** @return Person[] */
    public function search(): array
    {
        return $this->personModel->search();
    }
}