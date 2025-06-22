<?php 

namespace Src\Entity\Comment;

use DateTime;

final class Comment {

    public function __construct(
        private readonly ?int $id,
        private int $entertainmentId,
        private string $author,
        private string $content,
        private DateTime $date
    ) {}

    public static function create(int $entertainmentId, string $author, string $content, DateTime $date): self
    {
        $author = trim($author) === '' ? 'Anónimo' : $author;
        return new self(null, $entertainmentId, $author, $content, $date);
    }

    public function modify(int $entertainmentId, string $author, string $content): void
    {
        $this->entertainmentId = $entertainmentId;
        $this->author = trim($author) === '' ? 'Anónimo' : $author;
        $this->content = $content;
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function entertainmentId(): int
    {
        return $this->entertainmentId;
    }

    public function author(): string
    {
        return $this->author;
    }

    public function content(): string
    {
        return $this->content;
    }

    public function date(): DateTime
    {
        return $this->date;
    }
}
