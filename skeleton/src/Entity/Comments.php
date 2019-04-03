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
     * @ORM\Column(type="bigint")
     */
    private $id_com;

    /**
     * @ORM\Column(type="bigint")
     */
    private $id_user;

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

    public function getIdCom(): ?int
    {
        return $this->id_com;
    }

    public function setIdCom(int $id_com): self
    {
        $this->id_com = $id_com;

        return $this;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

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

}
