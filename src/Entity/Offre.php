<?php

namespace App\Entity;

use App\Repository\OffreRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OffreRepository::class)]
class Offre
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idpost = null;

    #[ORM\Column]
    private ?int $idcountry = null;

    #[ORM\Column]
    private ?float $prixpost = null;

    #[ORM\Column(length: 200, nullable: true)]
    private ?string $descriptionpost = null;

    #[ORM\Column(nullable: true)]
    private ?int $likespost = null;

    #[ORM\Column(length: 1000, nullable: true)]
    private ?string $photopost = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datefin = null;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'idpost', orphanRemoval: true)]
    private Collection $reservations;

    #[ORM\ManyToOne(inversedBy: 'offres')]
    #[ORM\JoinColumn(name: 'iduser', referencedColumnName: 'iduser', nullable: false)]
    private ?User $iduser = null;

    public function __construct()
    {
        $this->reservations = new ArrayCollection();
    }

    public function getIDPost(): ?int
    {
        return $this->idpost;
    }

    public function getIDCountry(): ?int
    {
        return $this->idcountry;
    }

    public function setIDCountry(int $IDCountry): static
    {
        $this->idcountry = $IDCountry;

        return $this;
    }

    public function getPrixPost(): ?float
    {
        return $this->prixpost;
    }

    public function setPrixPost(float $PrixPost): static
    {
        $this->prixpost = $PrixPost;

        return $this;
    }

    public function getDescriptionPost(): ?string
    {
        return $this->descriptionpost;
    }

    public function setDescriptionPost(?string $DescriptionPost): static
    {
        $this->descriptionpost = $DescriptionPost;

        return $this;
    }

    public function getLikesPost(): ?int
    {
        return $this->likespost;
    }

    public function setLikesPost(?int $LikesPost): static
    {
        $this->likespost = $LikesPost;

        return $this;
    }

    public function getPhotoPost(): ?string
    {
        return $this->photopost;
    }

    public function setPhotoPost(?string $PhotoPost): static
    {
        $this->photopost = $PhotoPost;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDateDebut(\DateTimeInterface $DateDebut): static
    {
        $this->datedebut = $DateDebut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDateFin(\DateTimeInterface $DateFin): static
    {
        $this->datefin = $DateFin;

        return $this;
    }

    /**
     * @return Collection<int, Reservation>
     */
    public function getReservations(): Collection
    {
        return $this->reservations;
    }

    public function addReservation(Reservation $reservation): static
    {
        if (!$this->reservations->contains($reservation)) {
            $this->reservations->add($reservation);
            $reservation->setIDPost($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getIDPost() === $this) {
                $reservation->setIDPost(null);
            }
        }

        return $this;
    }

    public function getidUser(): ?User
    {
        return $this->iduser;
    }

    public function setidUser(?User $idUser): static
    {
        $this->iduser = $idUser;

        return $this;
    }
}
