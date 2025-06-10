<?php 

namespace Src\Entity\User\Exception;

use Exception;

final class UserNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro el User correspondiente. Id: ".$id);
    }
}