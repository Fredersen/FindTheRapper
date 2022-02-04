<?php

namespace App\Entity;

use App\Repository\GameRepository;
use DateTime;
use DateTimeInterface;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;



/**
 * @ORM\Entity(repositoryClass=GameRepository::class)
 * @UniqueEntity(fields={"level"}, message="Il existe déjà un jeu correspondant à ce niveau !")
 * @Vich\Uploadable
 */
class Game
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private int $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private string $name;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     * @var ?string
     */
    private ?string $photoRapper = "";

    /**
     * @Vich\UploadableField(mapping="rapper", fileNameProperty="photoRapper")
     * @Assert\File(
     *     maxSize = "3M",
     *     mimeTypes = {"image/jpeg", "image/png", "image/webp"},
     * )
     * @Ignore()
     * @var ?File
     */
    private ?File $photoRapperFile = null;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     * @var ?string
     */
    private ?string $searchSound = "";

    /**
     * @Vich\UploadableField(mapping="search", fileNameProperty="searchSound")
     * @Assert\File(
     *     maxSize = "10M",
     * )
     * @Ignore()
     * @var ?File
     */
    private ?File $searchSoundFile = null;

    /**
     * @ORM\Column(type="string", length=255, nullable="true")
     * @var ?string
     */
    private ?string $victorySound = "";

    /**
     * @Vich\UploadableField(mapping="victory", fileNameProperty="victorySound")
     * @Assert\File(
     *     maxSize = "200M",
     * )
     * @Ignore()
     * @var ?File
     */
    private ?File $victorySoundFile = null;

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

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private ?\DateTimeInterface $updatedAt;

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

    public function getPhotoRapper(): ?string
    {
        return $this->photoRapper;
    }

    public function setPhotoRapper(?string $photoRapper): self
    {
        $this->photoRapper = $photoRapper;

        return $this;
    }

    public function getSearchSound(): ?string
    {
        return $this->searchSound;
    }

    public function setSearchSound(?string $searchSound): self
    {
        $this->searchSound = $searchSound;

        return $this;
    }

    public function getVictorySound(): ?string
    {
        return $this->victorySound;
    }

    public function setVictorySound(?string $victorySound): self
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

    public function setPhotoRapperFile(File $image = null): Void
    {
        $this->photoRapperFile = $image;
        if ($image) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getPhotoRapperFile(): ?File
    {
        return $this->photoRapperFile;
    }

    public function setSearchSoundFile(File $song = null): Void
    {
        $this->searchSoundFile = $song;
        if ($song) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getSearchSoundFile(): ?File
    {
        return $this->searchSoundFile;
    }

    public function setVictorySoundFile(File $song = null): Void
    {
        $this->victorySoundFile = $song;
        if ($song) {
            $this->updatedAt = new DateTime('now');
        }
    }

    public function getVictorySoundFile(): ?File
    {
        return $this->victorySoundFile;
    }



    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }

}
