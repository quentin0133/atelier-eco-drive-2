<?php

namespace App\Controller;

use App\Document\Vehicle;
use App\Repository\VehicleRepository;
use Doctrine\ODM\MongoDB\DocumentManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Document\Incident;
use App\Form\IncidentType;
use Symfony\Component\HttpFoundation\Request;

class VehicleController extends AbstractController
{
    #[Route('/vehicles', name: 'vehicles_index', methods: ['GET'])]
    public function index(DocumentManager $dm): Response
    {
        /** @var VehicleRepository $repo */
        $repo = $dm->getRepository(Vehicle::class);

        $vehicles = method_exists($repo, 'findAllOrdered')
            ? $repo->findAllOrdered()
            : $repo->findAll();

        return $this->render('vehicle/index.html.twig', [
            'vehicles' => $vehicles,
        ]);
    }

    #[Route('/vehicles/{id}/incident', name: 'add_incident', methods: ['GET', 'POST'])]
    public function addIncident(string $id, Request $request, DocumentManager $dm): Response
    {
        /** @var Vehicle|null $vehicle */
        $vehicle = $dm->getRepository(Vehicle::class)->find($id);

        if (!$vehicle) {
            throw $this->createNotFoundException('Véhicule introuvable');
        }

        $incident = new Incident();
        $form = $this->createForm(IncidentType::class, $incident);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $vehicle->addIncident($incident);

            $dm->persist($vehicle);
            $dm->flush();

            $this->addFlash('success', 'Incident ajouté');

            return $this->redirectToRoute('vehicles_index');
        }

        return $this->render('vehicle/add_incident.html.twig', [
            'vehicle' => $vehicle,
            'form' => $form->createView(),
        ]);
    }
}
