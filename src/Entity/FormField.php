<?php

namespace App\Entity;

use App\Repository\FormFieldRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormFieldRepository::class)]
class FormField
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $label = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $type = null;

    #[ORM\ManyToOne(targetEntity: Form::class, inversedBy: 'fields')]
    private ?Form $Form = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLabel(): ?string
    {
        return $this->label;
    }

    public function setLabel(?string $label): static
    {
        $this->label = $label;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(?string $type): static
    {
        $this->type = $type;

        return $this;
    }

    public function getForm(): ?Form
    {
        return $this->Form;
    }

    public function setForm(?Form $Form): static
    {
        $this->Form = $Form;

        return $this;
    }

    public function __toString(): string
    {
        return $this->label . ' (' . $this->type . ')';
    }
}
