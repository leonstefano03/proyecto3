<?php 

namespace Src\Entity\Comment\Exception;

use Exception;

final class CommentNotFoundException extends Exception {
    public function __construct(int $id) {
        parent::__construct("No se encontro el comentario correspondiente. Id: ".$id);
    }
}