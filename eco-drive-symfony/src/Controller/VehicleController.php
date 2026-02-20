<?php
namespace App\Controller;

use App\Document\Vehicle;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Attribute\Route;
use Doctrine\ODM\MongoDB\DocumentManager;

class VehicleController
{
    #[Route('/vehicle', name: 'list', methods: ['GET'])]
    public function list(DocumentManager $dm): JsonResponse
    {
        $vehicles = $dm->getRepository(Vehicle::class)->findAll();

        $data = array_map(fn($vehicle) => [
            'id' => $vehicle->getId(),
            'brand' => $vehicle->getBrand(),
            'status' => $vehicle->getStatus(),
            'model' => $vehicle->getModel(),
            'registration' => $vehicle->getRegistration(),
            'incidentHistories' => array_map(fn($h) => [
                'id' => $h->getId(),
                'date' => $h->getDate()?->format(DATE_ATOM),
                'type' => $h->getType(),
            ], $vehicle->getIncidentHistories()->toArray()),
        ], $vehicles);
        dump($dm->getMetadataFactory()->getAllMetadata());
        die();
        return new JsonResponse($data);

    }

}
