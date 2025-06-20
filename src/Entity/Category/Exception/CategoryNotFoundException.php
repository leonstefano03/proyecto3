<?php 

namespace Src\Entity\Category\Exception;

use Exception;

final class CategoryNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro el category correspondiente. Id: ".$id);
    }
}