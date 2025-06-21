<?php 

declare(strict_types = 1);

namespace Src\Service\Entertainment;

use Src\Model\Entertainment\EntertainmentModel;
use Src\Entity\Entertainment\Entertainment;
use DateTime;

final readonly class EntertainmentCreatorService {

    private EntertainmentModel $model;

    public function __construct() 
    {
        $this->model = new EntertainmentModel();
    }

    public function create(int $type, DateTime $releaseDate, bool $isFinal, string $name, string $description, int $categoryId, string $imageUrl): void 
    {
        $entertainment = Entertainment::create($type, $releaseDate, $isFinal, $name, $description, $categoryId, $imageUrl);
        $this->model->insert($entertainment);
    }

}

