<?php 

declare(strict_types = 1);

namespace Src\Service\Entertainment;

use Src\Model\Entertainment\EntertainmentModel;
use Src\Entity\Entertainment\Entertainment;
use DateTime;

final readonly class EntertainmentUpdaterService {

    private EntertainmentModel $model;
    private EntertainmentFinderService $finder;
    public function __construct() 
    {
        $this->model = new EntertainmentModel();
        $this->finder = new EntertainmentFinderService();
    }

    public function update(int $id, int $type, DateTime $releaseDate, int $isFinal, string $name, string $description, int $categoryId,
    string $imageUrl): void 
    {
        $domain = $this->finder->find($id);
        $domain->modify($type, $releaseDate, $isFinal, $name, $description, $categoryId, $imageUrl);
        $this->model->update($domain);
    }

    public function find(int $id): ?Entertainment { //esta no se si va, o deberia cargar el service de finder en el controlador de put
        return $this->finder->find($id);
    }

}

