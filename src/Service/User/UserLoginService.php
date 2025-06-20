<?php 

declare(strict_types = 1);

namespace Src\Service\User;

use Src\Model\User\UserModel;
use Src\Entity\User\User;
use Src\Entity\User\Exception\UserNotFoundException;

final readonly class UserLoginService {

    private UserModel $model;

    public function __construct() 
    {
        $this->model = new UserModel();
    }

    public function find(string $email, string $password): ?User 
    {
        $user = $this->model->findByEmailAndPassword($email, $password);

        return $user;
    }

}

