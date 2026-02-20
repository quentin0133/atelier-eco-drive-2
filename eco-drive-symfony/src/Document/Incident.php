<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\EmbeddedDocument]
class Incident
{
    #[MongoDB\Field(type: "date")]
    private ?string $date = null;

    #[MongoDB\Field(type: "string")]
    private ?string $type = null;

    #[MongoDB\Field(type: "string")]
    private ?string $description = null;

    public function getDate(): ?string
    {
        return $this->date;
    }

    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}
