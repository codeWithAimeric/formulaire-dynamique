<?php

namespace App\Entity;

use App\Repository\InfoRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: InfoRepository::class)]
class Info
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $formId = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fieldLabel = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $fieldValue = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFormId(): ?int
    {
        return $this->formId;
    }

    public function setFormId(?int $formId): static
    {
        $this->formId = $formId;

        return $this;
    }

    public function getFieldLabel(): ?string
    {
        return $this->fieldLabel;
    }

    public function setFieldLabel(?string $fieldLabel): static
    {
        $this->fieldLabel = $fieldLabel;

        return $this;
    }

    public function getFieldValue(): ?string
    {
        return $this->fieldValue;
    }

    public function setFieldValue(?string $fieldValue): static
    {
        $this->fieldValue = $fieldValue;

        return $this;
    }
}
