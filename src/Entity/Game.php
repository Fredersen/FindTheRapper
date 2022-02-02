<?php

namespace App\Entity;

use App\Repository\GameRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 * @UniqueEntity(fields={"level"}, message="Il existe déjà un jeu correspondant à ce niveau !")
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoMap;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoRapper;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $searchSound;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $victorySound;

    /**
     * @ORM\Column(type="integer")
     */
    private $positionX;

    /**
     * @ORM\Column(type="integer")
     */
    private $positionY;

    /**
     * @ORM\Column(type="integer")
     */
    private $time;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\OneToMany(targetEntity=User::class, mappedBy="game")
     */
    private $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getPhotoMap(): ?string
    {
        return $this->photoMap;
    }

    public function setPhotoMap(string $photoMap): self
    {
        $this->photoMap = $photoMap;

        return $this;
    }

    public function getPhotoRapper(): ?string
    {
        return $this->photoRapper;
    }

    public function setPhotoRapper(string $photoRapper): self
    {
        $this->photoRapper = $photoRapper;

        return $this;
    }

    public function getSearchSound(): ?string
    {
        return $this->searchSound;
    }

    public function setSearchSound(string $searchSound): self
    {
        $this->searchSound = $searchSound;

        return $this;
    }

    public function getVictorySound(): ?string
    {
        return $this->victorySound;
    }

    public function setVictorySound(string $victorySound): self
    {
        $this->victorySound = $victorySound;

        return $this;
    }

    public function getPositionX(): ?int
    {
        return $this->positionX;
    }

    public function setPositionX(int $positionX): self
    {
        $this->positionX = $positionX;

        return $this;
    }

    public function getPositionY(): ?int
    {
        return $this->positionY;
    }

    public function setPositionY(int $positionY): self
    {
        $this->positionY = $positionY;

        return $this;
    }

    public function getTime(): ?int
    {
        return $this->time;
    }

    public function setTime(int $time): self
    {
        $this->time = $time;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * @return Collection|User[]
     */
    public function getUsers(): Collection
    {
        return $this->users;
    }

    public function addUser(User $user): self
    {
        if (!$this->users->contains($user)) {
            $this->users[] = $user;
            $user->setGame($this);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        if ($this->users->removeElement($user)) {
            // set the owning side to null (unless already changed)
            if ($user->getGame() === $this) {
                $user->setGame(null);
            }
        }

        return $this;
    }
}
