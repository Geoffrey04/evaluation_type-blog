<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\Collection;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CommentsRepository")
 */
class Comments
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Article", inversedBy="comments")
     * @ORM\JoinColumn(nullable=false)
     */
    private $art;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }




    public function getComments(): Collection

    {
        return $this->contenu;
    }


    public function addComment(Comments $comments): self
    {
        if (!$this->contenu->contains($comments)) {

            $this->contenu[] = $comments;

            $comments->setIdUser($this);

            return $this;
        }
    }


    public function removeComment(Comments $comments): self

    {

        if ($this->contenu->contains($comments)) {

            $this->contenu->removeElement($comments);


            if ($comments->getIdUser() === $this) {

                $comments->setIdUser(null);

            }

        }


        return $this;


    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getArt(): ?Article
    {
        return $this->art;
    }

    public function setArt(?Article $art): self
    {
        $this->art = $art;

        return $this;
    }


}
