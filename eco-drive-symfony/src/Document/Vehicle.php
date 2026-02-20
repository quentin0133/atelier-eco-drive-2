<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\Document(collection: "vehicles")]
class Vehicle
{
    #[MongoDB\Id]
    private ?string $id = null;

    #[MongoDB\Field(type: "string")]
    private ?string $brand = null;

    #[MongoDB\Field(type: "string")]
    private ?string $status = null;

    #[MongoDB\EmbedOne]
    private ?Model $model = null;

    #[MongoDB\Field(type: "string")]
    private ?string $registration = null;

    #[MongoDB\EmbedMany]
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
