<?php 

namespace Src\Entity\Person\Exception;

use Exception;

final class PersonNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro la persona correspondiente. Id: ".$id);
    }
}