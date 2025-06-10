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

    public function update(int $id, int $type, DateTime $releaseDate, bool $isFinal, string $name, string $description, int $categoryId): void 
    {
        $domain = $this->finder->find($id);
        $domain->modify($type, $releaseDate, $isFinal, $name, $description, $categoryId);
        $this->model->update($domain);
    }

}

