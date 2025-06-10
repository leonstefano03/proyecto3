<?php 

declare(strict_types = 1);

namespace Src\Service\Person;

use Src\Model\Person\PersonModel;
use Src\Entity\Person\Person;
use Src\Entity\Person\Exception\PersonNotFoundException;

final readonly class PersonFinderService {

    private PersonModel $model;

    public function __construct() 
    {
        $this->model = new PersonModel();
    }

    public function find(int $id): Person 
    {
        $person = $this->model->find($id);

        if ($person === null) {
            throw new PersonNotFoundException($id);
        }

        return $person;
    }

}

