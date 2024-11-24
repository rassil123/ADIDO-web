<?php

namespace App\Entity;

use App\Repository\CommentsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CommentsRepository::class)]
class Comments
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $idcomment = null;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(name : "idblog", referencedColumnName : "idblog", nullable: false)]
    private ?blog $idblog = null;

    #[ORM\Column(nullable: true)]
    private ?int $likescomment = null;

    #[ORM\Column(length: 255)]
    private ?string $contentcomment = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datecomment = null;

    #[ORM\ManyToOne(targetEntity: self::class, inversedBy: 'reply')]
    #[ORM\JoinColumn(name : "idcomment", referencedColumnName : "idcomment", nullable: false)]
    private ?self $comments = null;

    #[ORM\OneToMany(targetEntity: self::class, mappedBy: 'comments')]
    private Collection $reply;

    #[ORM\ManyToOne(inversedBy: 'comments')]
    #[ORM\JoinColumn(name : "iduser", referencedColumnName : "iduser", nullable: false)]
    private ?User $iduser = null;

    public function __construct()
    {
        $this->reply = new ArrayCollection();
    }

    public function getIDComment(): ?int
    {
        return $this->idcomment;
    }

    public function getIDBlog(): ?blog
    {
        return $this->idblog;
    }

    public function setIDBlog(?blog $IDBlog): static
    {
        $this->idblog = $IDBlog;

        return $this;
    }

    public function getLikesComment(): ?int
    {
        return $this->likescomment;
    }

    public function setLikesComment(?int $LikesComment): static
    {
        $this->likescomment = $LikesComment;

        return $this;
    }

    public function getContentComment(): ?string
    {
        return $this->contentcomment;
    }

    public function setContentComment(string $ContentComment): static
    {
        $this->contentcomment = $ContentComment;

        return $this;
    }

    public function getDateComment(): ?\DateTimeInterface
    {
        return $this->datecomment;
    }

    public function setDateComment(\DateTimeInterface $DateComment): static
    {
        $this->datecomment = $DateComment;

        return $this;
    }

    public function getComments(): ?self
    {
        return $this->comments;
    }

    public function setComments(?self $comments): static
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * @return Collection<int, self>
     */
    public function getReply(): Collection
    {
        return $this->reply;
    }

    public function addReply(self $reply): static
    {
        if (!$this->reply->contains($reply)) {
            $this->reply->add($reply);
            $reply->setComments($this);
        }

        return $this;
    }

    public function removeReply(self $reply): static
    {
        if ($this->reply->removeElement($reply)) {
            // set the owning side to null (unless already changed)
            if ($reply->getComments() === $this) {
                $reply->setComments(null);
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
