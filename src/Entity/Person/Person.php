<?php 

namespace Src\Entity\Person;

final readonly class Person {

    public function __construct(
        private int $id,
        private string $name,
        private string $lastName
    ) {
    }

    public function id(): int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function lastName(): string
    {
        return $this->lastName;
    }
}