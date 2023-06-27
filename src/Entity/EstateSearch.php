<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class EstateSearch
{
    private ?string $search = null;

    #[Assert\PositiveOrZero()]
    #[Assert\LessThan(propertyPath: 'maxPrice')]
    private ?int $minPrice = null;

    #[Assert\Positive()]
    private ?int $maxPrice = null;

    /**
     * Get the value of search
     */
    public function getSearch(): ?string
    {
        return $this->search;
    }

    /**
     * Set the value of search
     */
    public function setSearch(?string $search): self
    {
        $this->search = $search;

        return $this;
    }

    /**
     * Get the value of minPrice
     */
    public function getMinPrice(): ?int
    {
        return $this->minPrice;
    }

    /**
     * Set the value of minPrice
     */
    public function setMinPrice(?int $minPrice): self
    {
        $this->minPrice = $minPrice;

        return $this;
    }

    /**
     * Get the value of maxPrice
     */
    public function getMaxPrice(): ?int
    {
        return $this->maxPrice;
    }

    /**
     * Set the value of maxPrice
     */
    public function setMaxPrice(?int $maxPrice): self
    {
        $this->maxPrice = $maxPrice;

        return $this;
    }
}
