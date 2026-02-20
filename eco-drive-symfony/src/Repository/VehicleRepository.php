<?php

namespace App\Repository;

use App\Document\Vehicle;
use Doctrine\ODM\MongoDB\Repository\DocumentRepository;

class VehicleRepository extends DocumentRepository
{
    /** @return Vehicle[] */
    public function findAllVehicles(): array
    {
        return $this->createQueryBuilder()
            ->sort('_id', 'asc')
            ->getQuery()
            ->execute()
            ->toArray();
    }
}
