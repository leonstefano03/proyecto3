<?php

namespace src\Entity\Entertainment;

use DateTime;

final class Entertainment
{
    public function __construct(
        private readonly ?int $id,
        private int $type,
        private DateTime $releaseDate,
        private bool $isFinal,
        private string $name,
        private string $description,
        private int $categoryId,
        private string $imageUrl,
    ) {
    }

    public static function create(int $type, DateTime $releaseDate, bool $isFinal, string $name, string $description, int $categoryId, string $imageUrl) : self
    { 
        return new self(null, $type, $releaseDate, $isFinal, $name, $description, $categoryId, $imageUrl);
    }

    public function modify(int $type, DateTime $releaseDate, bool $isFinal, string $name, string $description, int $categoryId, string $imageUrl): void
    {
        $this->type = $type;
        $this->releaseDate = $releaseDate;
        $this->isFinal = $isFinal;
        $this->name = $name;
        $this->description = $description;
        $this->categoryId = $categoryId;
        $this->imageUrl = $imageUrl;
    }

    public function id(): int
    {
        return $this->id;
    }

    public function type(): int
    {
        return $this->type;
    }

    public function releaseDate(): DateTime
    {
        return $this->releaseDate;
    }

    public function isFinal(): bool
    {
        return $this->isFinal;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function categoryId(): int
    {
        return $this->categoryId;
    }

    public function imageUrl(): string
    {
        return $this->imageUrl;
    }

    

}