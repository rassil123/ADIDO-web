<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProductRepository::class)]
class Product
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idproduct = null;

    #[ORM\Column(length: 30)]
    private ?string $categorieproduct = null;

    #[ORM\Column(length: 30)]
    private ?string $nomproduct = null;

    #[ORM\Column]
    private ?float $prixproduct = null;

    #[ORM\Column]
    private ?int $stockproduct = null;

    #[ORM\ManyToOne(inversedBy: 'products')]
    #[ORM\JoinColumn(name: 'idcountry', referencedColumnName: 'idcountry', nullable: false)]
    private ?Country $idcountry = null;

    #[ORM\Column(nullable: true)]
    private ?int $promotionproduct = null;

    public function getIDProduct(): ?int
    {
        return $this->idproduct;
    }

    public function getCategorieProduct(): ?string
    {
        return $this->categorieproduct;
    }

    public function setCategorieProduct(string $CategorieProduct): static
    {
        $this->categorieproduct = $CategorieProduct;

        return $this;
    }

    public function getNomProduct(): ?string
    {
        return $this->nomproduct;
    }

    public function setNomProduct(string $NomProduct): static
    {
        $this->nomproduct = $NomProduct;

        return $this;
    }

    public function getPrixProduct(): ?float
    {
        return $this->prixproduct;
    }

    public function setPrixProduct(float $PrixProduct): static
    {
        $this->prixproduct = $PrixProduct;

        return $this;
    }

    public function getStockProduct(): ?int
    {
        return $this->stockproduct;
    }

    public function setStockProduct(int $StockProduct): static
    {
        $this->stockproduct = $StockProduct;

        return $this;
    }

    public function getIDCountry(): ?Country
    {
        return $this->idcountry;
    }

    public function setIDCountry(?Country $IDCountry): static
    {
        $this->idcountry = $IDCountry;

        return $this;
    }

    public function getPromotionProduct(): ?int
    {
        return $this->promotionproduct;
    }

    public function setPromotionProduct(?int $PromotionProduct): static
    {
        $this->promotionproduct = $PromotionProduct;

        return $this;
    }
}
