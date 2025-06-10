<?php
namespace src\Model\Entertainment;

use src\Model\DatabaseModel;
use src\Entity\Entertainment\Entertainment;
use DateTime;

final readonly class EntertainmentModel extends DatabaseModel {

  public function find(int $id): ?Entertainment
  {
    $query = <<<SELECT_QUERY
                  SELECT 
                    E.id,
                    E.type,
                    E.release_date,
                    E.is_final,
                    E.name,
                    E.description,
                    E.category_id
                  FROM
                    entertainment E
                  WHERE
                    E.id = :id
                SELECT_QUERY;

    $parameters = [
      'id' => $id
    ];

    $result = $this -> primitiveQuery($query, $parameters);
    return $this->toEntertainment($result[0] ?? null);
  }

  public function search(): array
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        E.id,
                        E.type,
                        E.release_date,
                        E.is_final,
                        E.name,
                        E.description,
                        E.category_id
                    FROM 
                        Entertainment E
                SELECT_QUERY;

        $primitiveResults = $this->primitiveQuery($query);

        $objectResults = [];
        
        foreach ($primitiveResults as $primitiveResult) {
            $objectResults[] = $this->toEntertainment($primitiveResult);
        }

        return $objectResults;
    }

   public function insert(Entertainment $entertainment): void
    {
        $query = <<<INSERT_QUERY
                    INSERT INTO 
                        entertainment
                    (type, release_date, is_final, name, description, category_id, date)
                        VALUES
                    (:type, :release_date, :is_final, :name, :description, :category_id, :date)
                INSERT_QUERY;

        $parameters = [
            'type' => $entertainment->type(),
            'release_date' => $entertainment->releaseDate()->format("Y-m-d H:i:s"),
            'is_final' => $entertainment->isFinal(),
            'name' => $entertainment->name(),
            'description' => $entertainment->description(),
            'category_id' => $entertainment->categoryId(),
            'date' => (new DateTime())->format("Y-m-d H:i:s")
        ];
        $this->primitiveQuery($query, $parameters);

    }
    public function update(Entertainment $entertainment): void
    {
        $query = <<<UPDATE_QUERY
            UPDATE 
                entertainment
            SET 
                type = :type,
                release_date = :release_date,
                is_final = :is_final,
                name = :name,
                description = :description,
                category_id = :category_id
            WHERE
                id = :id
        UPDATE_QUERY;
    
        $parameters = [
            'id' => $entertainment->id(),
            'type' => $entertainment->type(),
            'release_date' => $entertainment->releaseDate()->format("Y-m-d H:i:s"),
            'is_final' => $entertainment->isFinal(),
            'name' => $entertainment->name(),
            'description' => $entertainment->description(),
            'category_id' => $entertainment->categoryId(),
        ];
    
        $this->primitiveQuery($query, $parameters);
    }

  private function toEntertainment(?array $primitive): ?Entertainment
  {
    if ($primitive === null) {
      return null;
    }

    return new Entertainment(
      $primitive['id'] ?? 0,
      $primitive['type'] ?? '',
      new DateTime($primitive['release_date'] ?? 'now'),
      $primitive['is_final'] ?? false,
      $primitive['name'] ?? '',
      $primitive['description'] ?? '',
      $primitive['category_id'] ?? 0
    );
  }
}