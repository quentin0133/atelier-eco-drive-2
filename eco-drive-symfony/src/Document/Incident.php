<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class Incident
{
    #[ODM\Field(type: "string")]
    private string $date;

    #[ODM\Field(type: "string")]
    private string $type;

    #[ODM\Field(type: "string")]
    private string $description;

    public function __construct(
        string $date = "",
        string $type = "",
        string $description = ""
    ) {
        $this->date = $date;
        $this->type = $type;
        $this->description = $description;
    }

    public function getDate(): string { return $this->date; }
    public function setDate(string $date): self { $this->date = $date; return $this; }

    public function getType(): string { return $this->type; }
    public function setType(string $type): self { $this->type = $type; return $this; }

    public function getDescription(): string { return $this->description; }
    public function setDescription(string $description): self { $this->description = $description; return $this; }
}
