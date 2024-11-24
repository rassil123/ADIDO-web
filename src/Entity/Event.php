<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $ID_Event = null;

    #[ORM\Column(length: 30)]
    private ?string $Name_Event= null;

    #[ORM\Column(length: 601)]
    private ?string $description_event = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $StartEvent = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateendevent = null;

    #[ORM\Column(length: 30)]
    private ?string $locationevent = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(name: 'idcountry', referencedColumnName: 'idcountry', nullable: false)]
    private ?Country $idcountry = null;

    #[ORM\Column]
    private ?int $idorganiser = null;

    #[ORM\Column(nullable: true)]
    private ?int $nbattendees = null;

    public function getIDEvent(): ?int
    {
        return $this->ID_Event;
    }

    public function getNameEvent(): ?string
    {
        return $this->Name_Event;
    }

    public function setNameEvent(string $NameEvent): static
    {
        $this->Name_Event = $NameEvent;

        return $this;
    }

    public function getdescription_event(): ?string
    {
        return $this->description_event;
    }

    public function setdescription_event(string $Description_Event): static
    {
        $this->description_event = $Description_Event;

        return $this;
    }

    public function getDateStartEvent(): ?\DateTimeInterface
    {
        return $this->StartEvent;
    }

    public function setDateStartEvent(\DateTimeInterface $StartEvent): static
    {
        $this->StartEvent = $StartEvent;

        return $this;
    }

    public function getDateEndEvent(): ?\DateTimeInterface
    {
        return $this->dateendevent;
    }

    public function setDateEndEvent(\DateTimeInterface $DateEndEvent): static
    {
        $this->dateendevent = $DateEndEvent;

        return $this;
    }

    public function getLocationEvent(): ?string
    {
        return $this->locationevent;
    }

    public function setLocationEvent(string $LocationEvent): static
    {
        $this->locationevent = $LocationEvent;

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

    public function getIDOrganiser(): ?int
    {
        return $this->idorganiser;
    }

    public function setIDOrganiser(int $IDOrganiser): static
    {
        $this->idorganiser = $IDOrganiser;

        return $this;
    }

    public function getNbAttendees(): ?int
    {
        return $this->nbattendees;
    }

    public function setNbAttendees(?int $NbAttendees): static
    {
        $this->nbattendees = $NbAttendees;

        return $this;
    }
}