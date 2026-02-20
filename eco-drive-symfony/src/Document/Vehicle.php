<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations\Document;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Id;
use Doctrine\ODM\MongoDB\Mapping\Annotations\Field;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedOne;
use Doctrine\ODM\MongoDB\Mapping\Annotations\EmbedMany;

#[Document(collection: "vehicles")]
class Vehicle
{
    #[Id]
    private ?string $id = null;

    #[Field(type: "string")]
    private ?string $brand = null;

    #[Field(type: "string")]
    private ?string $status = null;

    #[EmbedOne(targetDocument: Model::class)]
    private ?Model $model = null;

    #[Field(type: "string")]
    private ?string $registration = null;

    #[EmbedMany(targetDocument: Incident::class)]
    private array $incidentHistories = [];

    public function getId(): ?string
    {
        return $this->id;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(?string $status): void
    {
        $this->status = $status;
    }

    public function getModel(): ?Model
    {
        return $this->model;
    }

    public function setModel(?Model $model): void
    {
        $this->model = $model;
    }

    public function getRegistration(): ?string
    {
        return $this->registration;
    }

    public function setRegistration(?string $registration): void
    {
        $this->registration = $registration;
    }

    public function getIncidentHistories(): array
    {
        return $this->incidentHistories;
    }

    public function setIncidentHistories(array $incidentHistories): void
    {
        $this->incidentHistories = $incidentHistories;
    }
}
