<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommandeRepository::class)]
class Commande
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $references = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecommande = null;

    #[ORM\Column(length: 30)]
    private ?string $etatcommande = null;

    #[ORM\Column]
    private ?int $idproduit = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $coupon = null;

    #[ORM\ManyToOne(inversedBy: 'commandes')]
    #[ORM\JoinColumn(name : "iduser", referencedColumnName : "iduser", nullable: false)]
    private ?User $iduser = null;

    public function getReference(): ?int
    {
        return $this->references;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->datecommande;
    }

    public function setDateCommande(\DateTimeInterface $DateCommande): static
    {
        $this->datecommande = $DateCommande;

        return $this;
    }

    public function getEtatCommande(): ?string
    {
        return $this->etatcommande;
    }

    public function setEtatCommande(string $EtatCommande): static
    {
        $this->etatcommande = $EtatCommande;

        return $this;
    }

    public function getIDProduit(): ?int
    {
        return $this->idproduit;
    }

    public function setIDProduit(int $IDProduit): static
    {
        $this->idproduit = $IDProduit;

        return $this;
    }

    public function getCoupon(): ?string
    {
        return $this->coupon;
    }

    public function setCoupon(?string $Coupon): static
    {
        $this->coupon = $Coupon;

        return $this;
    }

    public function getidUser(): ?User
    {
        return $this->iduser;
    }

    public function setidUser(?user $idUser): static
    {
        $this->iduser = $idUser;

        return $this;
    }
}
