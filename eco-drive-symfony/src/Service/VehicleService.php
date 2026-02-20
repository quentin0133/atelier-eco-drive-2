<?php

namespace App\Service;

use App\Repository\VehicleRepository;

class VehicleService
{
    public function __construct(private VehicleRepository $vehicleRepository) {}

    public function list(): array
    {
        return $this->vehicleRepository->findAllVehicles();
    }
}
