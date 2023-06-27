<?php

namespace App\Entity;

use App\Repository\EstateCategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EstateCategoryRepository::class)]
class EstateCategory
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'estateCategory', targetEntity: Estate::class)]
    private Collection $estates;

    public function __construct()
    {
        $this->estates = new ArrayCollection();
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

    /**
     * @return Collection<int, Estate>
     */
    public function getEstates(): Collection
    {
        return $this->estates;
    }

    public function addEstate(Estate $estate): self
    {
        if (!$this->estates->contains($estate)) {
            $this->estates->add($estate);
            $estate->setEstateCategory($this);
        }

        return $this;
    }

    public function removeEstate(Estate $estate): self
    {
        if ($this->estates->removeElement($estate)) {
            // set the owning side to null (unless already changed)
            if ($estate->getEstateCategory() === $this) {
                $estate->setEstateCategory(null);
            }
        }

        return $this;
    }
}
