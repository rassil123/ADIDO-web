<?php

namespace App\Entity;

use App\Repository\ReservationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReservationRepository::class)]
class Reservation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idreservation = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(name: 'idpost', referencedColumnName: 'idpost', nullable: false)]
    private ?Offre $idpost = null;

    #[ORM\ManyToOne(inversedBy: 'reservations')]
    #[ORM\JoinColumn(name: 'iduser', referencedColumnName: 'iduser', nullable: false)]
    private ?User $iduser = null;


    public function getIDReservation(): ?int
    {
        return $this->idreservation;
    }

    public function getIDPost(): ?Offre
    {
        return $this->idpost;
    }

    public function setIDPost(?Offre $IDPost): static
    {
        $this->idpost = $IDPost;

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
