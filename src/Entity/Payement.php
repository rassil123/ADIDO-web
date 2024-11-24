<?php

namespace App\Entity;

use App\Repository\PayementRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PayementRepository::class)]
class Payement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idpayement = null;

    #[ORM\Column(length: 30)]
    private ?string $typepayement = null;

    #[ORM\Column]
    private ?float $montant = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datereglement = null;

    #[ORM\Column(length: 255)]
    private ?string $reference = null;

    public function getIDPayement(): ?int
    {
        return $this->idpayement;
    }

    public function getTypePayement(): ?string
    {
        return $this->typepayement;
    }

    public function setTypePayement(string $TypePayement): static
    {
        $this->typepayement = $TypePayement;

        return $this;
    }

    public function getMontant(): ?float
    {
        return $this->montant;
    }

    public function setMontant(float $Montant): static
    {
        $this->montant = $Montant;

        return $this;
    }

    public function getDateRegelement(): ?\DateTimeInterface
    {
        return $this->datereglement;
    }

    public function setDateRegelement(\DateTimeInterface $DateRegelement): static
    {
        $this->datereglement = $DateRegelement;

        return $this;
    }

    public function getReference(): ?string
    {
        return $this->reference;
    }

    public function setReference(string $Reference): static
    {
        $this->reference = $Reference;

        return $this;
    }
}
