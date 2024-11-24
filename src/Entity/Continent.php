<?php

namespace App\Entity;

use App\Repository\ContinentRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContinentRepository::class)]
class Continent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idcontinent = null;

    #[ORM\Column(length: 30)]
    private ?string $namecontinent = null;

    #[ORM\Column(length: 601)]
    private ?string $descriptioncontinent = null;

    #[ORM\OneToMany(targetEntity: Country::class, mappedBy: 'idcontinent', orphanRemoval: true)]
    private Collection $countries;


    public function __construct()
    {
        $this->countries = new ArrayCollection();
    }

    public function getIDContinent(): ?int
    {
        return $this->idcontinent;
    }

    public function getNameContinent(): ?string
    {
        return $this->namecontinent;
    }

    public function setNameContinent(string $NameContinent): static
    {
        $this->namecontinent = $NameContinent;

        return $this;
    }

    public function getDescriptionContinent(): ?string
    {
        return $this->descriptioncontinent;
    }

    public function setDescriptionContinent(string $DescriptionContinent): static
    {
        $this->descriptioncontinent = $DescriptionContinent;

        return $this;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getCountries(): Collection
    {
        return $this->countries;
    }

    public function addCountry(Country $Country): static
    {
        if (!$this->countries->contains($Country)) {
            $this->countries->add($Country);
            $Country->setIDContinent($this);
        }

        return $this;
    }

    public function removeCountry(Country $Country): static
    {
        if ($this->countries->removeElement($Country)) {
            // set the owning side to null (unless already changed)
            if ($Country->getIDContinent() === $this) {
                $Country->setIDContinent(null);
            }
        }

        return $this;
    }
}
