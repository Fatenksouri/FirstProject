<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SessionRepository::class)]
class Session
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $libelle = null;

    #[ORM\Column(length: 255)]
    private ?string $libelles = null;

    #[ORM\Column(length: 255)]
    private ?string $despriptions = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datedebut = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $datefin = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $createsds = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $updateds = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $enableds = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getLibelles(): ?string
    {
        return $this->libelles;
    }

    public function setLibelles(string $libelles): self
    {
        $this->libelles = $libelles;

        return $this;
    }

    public function getDespriptions(): ?string
    {
        return $this->despriptions;
    }

    public function setDespriptions(string $despriptions): self
    {
        $this->despriptions = $despriptions;

        return $this;
    }

    public function getDatedebut(): ?\DateTimeInterface
    {
        return $this->datedebut;
    }

    public function setDatedebut(\DateTimeInterface $datedebut): self
    {
        $this->datedebut = $datedebut;

        return $this;
    }

    public function getDatefin(): ?\DateTimeInterface
    {
        return $this->datefin;
    }

    public function setDatefin(\DateTimeInterface $datefin): self
    {
        $this->datefin = $datefin;

        return $this;
    }

    public function getCreatesds(): ?\DateTimeInterface
    {
        return $this->createsds;
    }

    public function setCreatesds(\DateTimeInterface $createsds): self
    {
        $this->createsds = $createsds;

        return $this;
    }

    public function getUpdateds(): ?\DateTimeInterface
    {
        return $this->updateds;
    }

    public function setUpdateds(\DateTimeInterface $updateds): self
    {
        $this->updateds = $updateds;

        return $this;
    }

    public function getEnableds(): ?\DateTimeInterface
    {
        return $this->enableds;
    }

    public function setEnableds(\DateTimeInterface $enableds): self
    {
        $this->enableds = $enableds;

        return $this;
    }
}
