<?php 

namespace Src\Model\User;

use Src\Model\DatabaseModel;
use Src\Entity\User\User;

final readonly class UserModel extends DatabaseModel {

    public function find(int $id): ?User
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        U.id,
                        U.email,
                        U.username,
                        U.password
                    FROM
                        user U
                    WHERE
                        U.id = :id
                SELECT_QUERY;

        $parameters = [
            'id' => $id
        ];

        $result = $this->primitiveQuery($query, $parameters);
        
        return $this->toUser($result[0] ?? null);
    }

    public function findByEmailAndPassword(string $email, string $password): ?User
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        U.id,
                        U.email,
                        U.username,
                        U.password
                    FROM
                        user U
                    WHERE
                        U.email = :email && u.password = :password
                SELECT_QUERY;

        $parameters = [
            'email' => $email,
            'password' => $password,
        ];

        $result = $this->primitiveQuery($query, $parameters);
        
        return $this->toUser($result[0] ?? null);
    }

    /** @return User[] */
    public function search(): array
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        U.id,
                        U.email,
                        U.username,
                        U.password
                    FROM 
                        user U
                SELECT_QUERY;

        $primitiveResults = $this->primitiveQuery($query);

        $objectResults = [];
        
        foreach ($primitiveResults as $primitiveResult) {
            $objectResults[] = $this->toUser($primitiveResult);
        }

        return $objectResults;
    }

    public function insert(User $user): void
    {
        $query = <<<INSERT_QUERY
                    INSERT INTO 
                        user
                    (email, username, password)
                        VALUES
                    (:email, :username, :password)
                INSERT_QUERY;

        $parameters = [
            'email' => $user->email(),
            'username' => $user->username(),
            'password' => $user->password()
        ];
        $this->primitiveQuery($query, $parameters);

    }
    public function update(User $user): void
    {
        $query = <<<UPDATE_QUERY
            UPDATE 
                user
            SET 
                email = :email,
                username = :username,
                password = :password,
            WHERE
                id = :id
        UPDATE_QUERY;
    
        $parameters = [
            'id' => $user->id(),
            'email' => $user->email(),
            'username' => $user->username(),
            'password' => $user->password(),
        ];
    
        $this->primitiveQuery($query, $parameters);
    }
    

    private function toUser(?array $primitive): ?User
    {
        if ($primitive === null) {
            return null;
        }

        return new User(
            $primitive['id'],
            $primitive['email'],
            $primitive['username'],
            $primitive['password']
        );
    }
}