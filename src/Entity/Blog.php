<?php

namespace App\Entity;

use App\Repository\BlogRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlogRepository::class)]
class Blog
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idblog = null;

    #[ORM\Column(length: 30)]
    private ?string $titleblog = null;

    #[ORM\Column(length: 1000)]
    private ?string $contentblog = null;

    #[ORM\Column(nullable: true)]
    private ?int $likesblog = null;

    #[ORM\Column(length: 30)]
    private ?string $categorie = null;

    #[ORM\Column]
    private ?int $idcountry = null;

    #[ORM\OneToMany(targetEntity: Comments::class, mappedBy: 'idblog', orphanRemoval: true)]
    private Collection $comments;

    #[ORM\ManyToOne(inversedBy: 'blogs')]
    #[ORM\JoinColumn(name : "iduser", referencedColumnName : "iduser", nullable: false)]
    private ?User $iduser = null;

    public function __construct()
    {
        $this->comments = new ArrayCollection();
    }

    public function getIDBlog(): ?int
    {
        return $this->idblog;
    }
    
    public function getTitleBlog(): ?string
    {
        return $this->titleblog;
    }

    public function setTitleBlog(string $TitleBlog): static
    {
        $this->titleblog = $TitleBlog;

        return $this;
    }

    public function getContentBlog(): ?string
    {
        return $this->contentblog;
    }

    public function setContentBlog(string $ContentBlog): static
    {
        $this->contentblog = $ContentBlog;

        return $this;
    }

    public function getLikesBlog(): ?int
    {
        return $this->likesblog;
    }

    public function setLikesBlog(?int $LikesBlog): static
    {
        $this->likesblog = $LikesBlog;

        return $this;
    }

    public function getCategorie(): ?string
    {
        return $this->categorie;
    }

    public function setCategorie(string $Categorie): static
    {
        $this->categorie = $Categorie;

        return $this;
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
            $comment->setIDBlog($this);
        }

        return $this;
    }

    public function removeComment(Comments $comment): static
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getIDBlog() === $this) {
                $comment->setIDBlog(null);
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
