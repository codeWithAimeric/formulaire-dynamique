<?php

namespace App\Entity;

use App\Repository\FormRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: FormRepository::class)]
class Form
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $name = null;

    /**
     * @var Collection<int, FormField>
     */
    #[ORM\OneToMany(targetEntity: FormField::class, mappedBy: 'Form',  cascade: ['persist', 'remove'], orphanRemoval: true)]
    private Collection $fields;

    public function __construct()
    {
        $this->fields = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): static
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, FormField>
     */
    public function getFields(): Collection
    {
        return $this->fields;
    }

    public function addField(FormField $formField): static
    {
        if (!$this->fields->contains($formField)) {
            $this->fields[] = $formField;
            $formField->setForm($this);
        }

        return $this;
    }

    public function removeField(FormField $formField): static
    {
        if ($this->fields->removeElement($formField)) {
            // set the owning side to null (unless already changed)
            if ($formField->getForm() === $this) {
                $formField->setForm(null);
            }
        }

        return $this;
    }
}
