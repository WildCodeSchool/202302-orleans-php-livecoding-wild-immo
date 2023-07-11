<?php

namespace App\Entity;

use App\Repository\EstateCaracteristicRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: EstateCaracteristicRepository::class)]
class EstateCaracteristic
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[Assert\Positive()]
    private ?int $value = null;

    #[ORM\ManyToOne(inversedBy: 'estateCaracteristics')]
    private ?Caracteristic $caracteristic = null;

    #[ORM\ManyToOne(inversedBy: 'estateCaracteristics')]
    private ?Estate $estate = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getValue(): ?int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;

        return $this;
    }

    public function getCaracteristic(): ?Caracteristic
    {
        return $this->caracteristic;
    }

    public function setCaracteristic(?Caracteristic $caracteristic): self
    {
        $this->caracteristic = $caracteristic;

        return $this;
    }

    public function getEstate(): ?Estate
    {
        return $this->estate;
    }

    public function setEstate(?Estate $estate): self
    {
        $this->estate = $estate;

        return $this;
    }
}
