<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserRepository::class)]
class User
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: "integer")]
    private ?int $iduser = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $firstname = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $lastname = null;

    #[ORM\Column]
    private ?int $phonenumber = null;

    #[ORM\Column(length: 100)]
    private ?string $username = null;

    #[ORM\Column(length: 30)]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    private ?string $password = null;

    //#[ORM\ManyToMany(targetEntity: Country::class, mappedBy: 'users')]
    #[ORM\JoinTable(name: "user")]
    private Collection $countries;
    
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $dob = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\OneToMany(targetEntity: Reservation::class, mappedBy: 'iduser', orphanRemoval: true)]
    private Collection $reservations;

    #[ORM\OneToMany(targetEntity: Offre::class, mappedBy: 'iduser', orphanRemoval: true)]
    private Collection $offres;

    #[ORM\OneToMany(targetEntity: Comments::class, mappedBy: 'iduser', orphanRemoval: true)]
    private Collection $comments;

    #[ORM\OneToMany(targetEntity: Commande::class, mappedBy: 'iduser')]
    private Collection $commandes;

    #[ORM\OneToMany(targetEntity: Blog::class, mappedBy: 'iduser', orphanRemoval: true)]
    private Collection $blogs;

    public function __construct()
    {
        $this->countries = new ArrayCollection();
        $this->reservations = new ArrayCollection();
        $this->offres = new ArrayCollection();
        $this->comments = new ArrayCollection();
        $this->commandes = new ArrayCollection();
        $this->blogs = new ArrayCollection();
    }


    public function getIduser(): ?int
    {
    return $this->iduser;
    }

    public function setIduser(?int $id): static
    {
    $this->iduser = $id;

    return $this;
    }


    public function getFirstName(): ?string
    {
        return $this->firstname;
    }

    public function setFirstName(?string $FirstName): static
    {
        $this->firstname = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastname;
    }

    public function setLastName(?string $LastName): static
    {
        $this->lastname = $LastName;

        return $this;
    }

    public function getPhoneNumber(): ?int
    {
        return $this->phonenumber;
    }

    public function setPhoneNumber(int $PhoneNumber): static
    {
        $this->phonenumber = $PhoneNumber;

        return $this;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $Username): static
    {
        $this->username = $Username;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $Email): static
    {
        $this->email = $Email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $Password): static
    {
        $this->password = $Password;

        return $this;
    }

    /**
     * @return Collection<int, Country>
     */
    public function getIDCountry(): Collection
    {
        return $this->countries;
    }

    public function addIDCountry(Country $iDCountry): static
    {
        if (!$this->countries->contains($iDCountry)) {
            $this->countries->add($iDCountry);
        }

        return $this;
    }

    public function removeIDCountry(Country $iDCountry): static
    {
        $this->countries->removeElement($iDCountry);

        return $this;
    }

    public function getDOB(): ?\DateTimeInterface
    {
        return $this->dob;
    }

    public function setDOB(?\DateTimeInterface $DOB): static
    {
        $this->dob = $DOB;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $Address): static
    {
        $this->address = $Address;

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
            $reservation->setidUser($this);
        }

        return $this;
    }

    public function removeReservation(Reservation $reservation): static
    {
        if ($this->reservations->removeElement($reservation)) {
            // set the owning side to null (unless already changed)
            if ($reservation->getidUser() === $this) {
                $reservation->setidUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Offre>
     */
    public function getOffres(): Collection
    {
        return $this->offres;
    }

    public function addOffre(Offre $offre): static
    {
        if (!$this->offres->contains($offre)) {
            $this->offres->add($offre);
            $offre->setidUser($this);
        }

        return $this;
    }

    public function removeOffre(Offre $offre): static
    {
        if ($this->offres->removeElement($offre)) {
            // set the owning side to null (unless already changed)
            if ($offre->getidUser() === $this) {
                $offre->setidUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Comments>
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comments $comment): static
    {
        if (!$this->comments->contains($comment)) {
            $this->comments->add($comment);
            $comment->setidUser($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getidUser() === $this) {
                $comment->setidUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Commande>
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }

    public function addCommande(Commande $commande): static
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes->add($commande);
            $commande->setidUser($this);
        }

        return $this;
    }

    public function removeCommande(Commande $commande): static
    {
        if ($this->commandes->removeElement($commande)) {
            // set the owning side to null (unless already changed)
            if ($commande->getidUser() === $this) {
                $commande->setidUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Blog>
     */
    public function getBlogs(): Collection
    {
        return $this->blogs;
    }

    public function addBlog(Blog $blog): static
    {
        if (!$this->blogs->contains($blog)) {
            $this->blogs->add($blog);
            $blog->setidUser($this);
        }

        return $this;
    }

    public function removeBlog(Blog $blog): static
    {
        if ($this->blogs->removeElement($blog)) {
            // set the owning side to null (unless already changed)
            if ($blog->getidUser() === $this) {
                $blog->setidUser(null);
            }
        }

        return $this;
    }
}
