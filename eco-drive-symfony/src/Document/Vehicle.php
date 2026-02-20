<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\Document(collection: "vehicles", repositoryClass: \App\Repository\VehicleRepository::class)]
class Vehicle
{
    #[ODM\Id]
    private ?string $id = null;

    #[ODM\Field(type: "string")]
    private string $brand;

    #[ODM\Field(type: "string")]
    private string $status;

    #[ODM\EmbedOne(targetDocument: Model::class)]
    private Model $model;

    #[ODM\Field(type: "string")]
    private string $registration;

    #[ODM\EmbedMany(targetDocument: Incident::class, name: "incident_histories")]
    private iterable $incidentHistories = [];

    public function __construct()
    {
        $this->incidentHistories = [];
    }

    // ===== GETTERS / SETTERS =====

    public function getId(): ?string { return $this->id; }

    public function getBrand(): string { return $this->brand; }
    public function setBrand(string $brand): self { $this->brand = $brand; return $this; }

    public function getStatus(): string { return $this->status; }
    public function setStatus(string $status): self { $this->status = $status; return $this; }

    public function getModel(): Model { return $this->model; }
    public function setModel(Model $model): self { $this->model = $model; return $this; }

    public function getRegistration(): string { return $this->registration; }
    public function setRegistration(string $registration): self { $this->registration = $registration; return $this; }

    public function getIncidentHistories(): iterable { return $this->incidentHistories; }

    public function setIncidentHistories(iterable $incidentHistories): self
    {
        $this->incidentHistories = $incidentHistories;
        return $this;
    }

    public function addIncident(Incident $incident): self
    {
        $this->incidentHistories[] = $incident;
        return $this;
    }
}
