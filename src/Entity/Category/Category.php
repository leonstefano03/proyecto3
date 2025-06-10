<?php 

namespace Src\Entity\Category;

final class Category {

    public function __construct(
        private readonly ?int $id,
        private string $name,
    ) {
    }

    public static function create(string $name) : self
    { 
        return new self(null, $name);
    }

    public function modify(string $name ): void
    {
        $this->name = $name;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }
}