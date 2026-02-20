<?php
namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

#[MongoDB\EmbeddedDocument]
class Model
{
    #[MongoDB\Field(type: "string")]
    private ?string $name = null;

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): void
    {
        $this->name = $name;
    }
}
