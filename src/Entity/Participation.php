<?php

namespace App\Entity;

use App\Repository\ParticipationRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ParticipationRepository::class)]
class Participation
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?float $amount = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $participation_date = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?Project $project = null;

    #[ORM\ManyToOne(inversedBy: 'participations')]
    private ?Person $donator = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAmount(): ?float
    {
        return $this->amount;
    }

    public function setAmount(float $amount): static
    {
        $this->amount = $amount;

        return $this;
    }

    public function getParticipationDate(): ?\DateTimeInterface
    {
        return $this->participation_date;
    }

    public function setParticipationDate(\DateTimeInterface $participation_date): static
    {
        $this->participation_date = $participation_date;

        return $this;
    }

    public function getProject(): ?Project
    {
        return $this->project;
    }

    public function setProject(?Project $project): static
    {
        $this->project = $project;

        return $this;
    }

    public function getDonator(): ?Person
    {
        return $this->donator;
    }

    public function setDonator(?Person $donator): static
    {
        $this->donator = $donator;

        return $this;
    }
}
