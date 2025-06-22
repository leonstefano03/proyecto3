<?php 

namespace Src\Model\Comment;

use Src\Model\DatabaseModel;
use Src\Entity\Comment\Comment;
use DateTime;

final readonly class CommentModel extends DatabaseModel {

    public function find(int $id): ?Comment
    {
        $query = <<<SQL
            SELECT 
                CO.id,
                CO.entertainment_id,
                CO.author,
                CO.content,
                CO.date
                date
            FROM 
                comments CO
            WHERE 
                id = :id
        SQL;

        $result = $this->primitiveQuery($query, ['id' => $id]);
        return $this->toComment($result[0] ?? null);
    }

    /** @return Category[] */
    public function search(): array
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        CO.id,
                        CO.entertainment_id,
                        CO.author,
                        CO.content,
                        CO,date
                    FROM 
                        comments CO
                SELECT_QUERY;

        $primitiveResults = $this->primitiveQuery($query);

        $objectResults = [];
        
        foreach ($primitiveResults as $primitiveResult) {
            $objectResults[] = $this->toComment($primitiveResult);
        }

        return $objectResults;
    }

    /** @return Comment[] */
    public function findByEntertainment(int $entertainmentId): array
    {
        $query = <<<SQL
            SELECT 
                CO.id,
                CO.entertainment_id,
                CO.author,
                CO.content,
                CO.date
            FROM 
                comments CO
            WHERE 
                entertainment_id = :entertainmentId
            ORDER BY date DESC
        SQL;

        $results = $this->primitiveQuery($query, ['entertainmentId' => $entertainmentId]);

        return array_map([$this, 'toComment'], $results);
    }

    public function insert(Comment $comment): void
    {
        $query = <<<SQL
            INSERT INTO comments (entertainment_id, author, content, date)
            VALUES (:entertainmentId, :author, :content, :date)
        SQL;

        $params = [
            'entertainmentId' => $comment->entertainmentId(),
            'author' => $comment->author(),
            'content' => $comment->content(),
            'date' => $comment->date()->format('Y-m-d H:i:s'),
        ];

        $this->primitiveQuery($query, $params);
    }
    public function update(Comment $Comment): void
    {
        $query = <<<UPDATE_QUERY
            UPDATE 
                comments
            SET 
                entertainment_id = :entertainment_id,
                author = :author,
                content = :content,

            WHERE
                id = :id
        UPDATE_QUERY;
    
        $parameters = [
            'entertainment_id' => $Comment->entertainmentId(),
            'author' => $Comment->author(),
            'content' => $Comment->content(),
            'id' => $Comment->id(),
        ];
    
        $this->primitiveQuery($query, $parameters);
    }

    public function delete(int $id): void
    {
        $query = <<<DELETE_QUERY
            DELETE FROM 
                comments
            WHERE
                id = :id
        DELETE_QUERY;

        $parameters = [
            'id' => $id,
        ];

        $this->primitiveQuery($query, $parameters);
    }

    private function toComment(?array $data): ?Comment
    {
        if ($data === null) {
            return null;
        }

        return new Comment(
            (int)$data['id'],
            (int)$data['entertainment_id'],
            $data['author'],
            $data['content'],
            new DateTime($data['date'])
        );
    }
}
