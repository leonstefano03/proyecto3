<?php 

declare(strict_types = 1);

namespace Src\Service\User;

use Src\Model\User\UserModel;
use Src\Entity\User\User;

final readonly class UserUpdaterService {

    private UserModel $model;
    private UserFinderService $finder;
    public function __construct() 
    {
        $this->model = new UserModel();
        $this->finder = new UserFinderService();
    }

    public function update(int $id, string $email, string $username, string $password): void 
    {
        $user = $this->finder->find($id);
        $user->modify ($email, $username, $password);
        $this->model->update($user);
    }

}

