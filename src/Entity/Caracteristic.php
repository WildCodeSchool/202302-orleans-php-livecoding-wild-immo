<?php

namespace App\Entity;

use App\Repository\CaracteristicRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CaracteristicRepository::class)]
class Caracteristic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $icon = null;

    #[ORM\OneToMany(mappedBy: 'caracteristic', targetEntity: EstateCaracteristic::class)]
    private Collection $estateCaracteristics;

    public function __construct()
    {
        $this->estateCaracteristics = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getIcon(): ?string
    {
        return $this->icon;
    }

    public function setIcon(string $icon): self
    {
        $this->icon = $icon;

        return $this;
    }

    /**
     * @return Collection<int, EstateCaracteristic>
     */
    public function getEstateCaracteristics(): Collection
    {
        return $this->estateCaracteristics;
    }

    public function addEstateCaracteristic(EstateCaracteristic $estateCaracteristic): self
    {
        if (!$this->estateCaracteristics->contains($estateCaracteristic)) {
            $this->estateCaracteristics->add($estateCaracteristic);
            $estateCaracteristic->setCaracteristic($this);
        }

        return $this;
    }

    public function removeEstateCaracteristic(EstateCaracteristic $estateCaracteristic): self
    {
        if ($this->estateCaracteristics->removeElement($estateCaracteristic)) {
            // set the owning side to null (unless already changed)
            if ($estateCaracteristic->getCaracteristic() === $this) {
                $estateCaracteristic->setCaracteristic(null);
            }
        }

        return $this;
    }
}
