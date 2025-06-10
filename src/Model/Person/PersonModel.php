<?php 

namespace Src\Model\Person;

use Src\Model\DatabaseModel;
use Src\Entity\Person\Person;

final readonly class PersonModel extends DatabaseModel {

    public function find(int $id): ?Person
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        P.id,
                        P.name,
                        P.lastName
                    FROM
                        person P
                    WHERE
                        P.id = :id
                SELECT_QUERY;

        $parameters = [
            'id' => $id
        ];

        $result = $this->primitiveQuery($query, $parameters);
        
        return $this->toPerson($result[0] ?? null);
    }

    /** @return Person[] */
    public function search(): array
    {
        $query = <<<SELECT_QUERY
                    SELECT
                        P.id,
                        P.name,
                        P.lastName
                    FROM 
                        person P
                SELECT_QUERY;

        $primitiveResults = $this->primitiveQuery($query);

        $objectResults = [];
        
        foreach ($primitiveResults as $primitiveResult) {
            $objectResults[] = $this->toPerson($primitiveResult);
        }

        return $objectResults;
    }

    private function toPerson(?array $primitive): ?Person
    {
        if ($primitive === null) {
            return null;
        }

        return new Person(
            $primitive['id'],
            $primitive['name'],
            $primitive['lastName']
        );
    }
}