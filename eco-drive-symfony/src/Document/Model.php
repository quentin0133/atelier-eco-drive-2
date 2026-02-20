<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

#[ODM\EmbeddedDocument]
class Model
{
    #[ODM\Field(type: "string")]
    private string $name;

    public function __construct(string $name = "")
    {
        $this->name = $name;
    }

    public function getName(): string { return $this->name; }
    public function setName(string $name): self { $this->name = $name; return $this; }
}
