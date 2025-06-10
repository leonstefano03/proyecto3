<?php 

namespace Src\Entity\User;

final class User {

    public function __construct(
        private readonly ?int $id,
        private string $email,
        private string $username,
        private string $password,
    ) {
    }

    public static function create(string $email, string $username, string $password) : self
    { 
        return new self(null, $email, $username, $password);
    }

    public function modify(string $email, string $username, string $password): void
    {
        $this->email = $email;
        $this->username = $username;
        $this->password = $password;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }
}