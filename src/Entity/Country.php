<?php

namespace App\Entity;

use App\Repository\CountryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CountryRepository::class)]
class Country
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idcountry = null;

    #[ORM\ManyToOne(inversedBy: 'countries')]
    #[ORM\JoinColumn(name: 'idcontinent', referencedColumnName: 'idcontinent', nullable: false)]
    private ?Continent $idcontinent;

    #[ORM\Column(length: 30)]
    private ?string $namecountry = null;

    #[ORM\Column(length: 601)]
    private ?string $descriptioncountry = null;

    //#[ORM\OneToMany(targetEntity: Event::class, mappedBy: 'idcountry', orphanRemoval: true)]
    private Collection $events;

    #[ORM\OneToMany(targetEntity: Product::class, mappedBy: 'idcountry')]
    private Collection $products;

    #[ORM\ManyToMany(targetEntity: User::class, mappedBy: 'countries')]
    private Collection $users;

    public function __construct()
    {
        $this->events = new ArrayCollection();
        $this->products = new ArrayCollection();
        $this->users = new ArrayCollection();
    }

    public function getIDCountry(): ?int
    {
        return $this->idcountry;
    }

    public function getIDContinent(): ?continent
    {
        return $this->idcontinent;
    }

    public function setIDContinent(?continent $IDContinent): static
    {
        $this->idcontinent = $IDContinent;

        return $this;
    }

    public function getNameCountry(): ?string
    {
        return $this->namecountry;
    }

    public function setNameCountry(string $NameCountry): static
    {
        $this->namecountry = $NameCountry;

        return $this;
    }

    public function getDescriptionCountry(): ?string
    {
        return $this->descriptioncountry;
    }

    public function setDescriptionCountry(string $DescriptionCountry): static
    {
        $this->descriptioncountry = $DescriptionCountry;

        return $this;
    }

    /**
     * @return Collection<int, Event>
     */
    public function getEvents(): Collection
    {
        return $this->events;
    }

    public function addEvent(Event $event): static
    {
        if (!$this->events->contains($event)) {
            $this->events->add($event);
            $event->setIDCountry($this);
        }

        return $this;
    }

    public function removeEvent(Event $event): static
    {
        if ($this->events->removeElement($event)) {
            // set the owning side to null (unless already changed)
            if ($event->getIDCountry() === $this) {
                $event->setIDCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Product>
     */
    public function getProducts(): Collection
    {
        return $this->products;
    }

    public function addProduct(Product $product): static
    {
        if (!$this->products->contains($product)) {
            $this->products->add($product);
            $product->setIDCountry($this);
        }

        return $this;
    }

    public function removeProduct(Product $product): static
    {
        if ($this->products->removeElement($product)) {
            // set the owning side to null (unless already changed)
            if ($product->getIDCountry() === $this) {
                $product->setIDCountry(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $User): static
    {
        if (!$this->users->contains($User)) {
            $this->users->add($User);
            $User->addIDCountry($this);
        }

        return $this;
    }

    public function removeUser(User $User): static
    {
        if ($this->users->removeElement($User)) {
            $User->removeIDCountry($this);
        }

        return $this;
    }
}
