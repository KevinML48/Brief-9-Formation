<?php

namespace App\Entity;

use App\Repository\AvisRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AvisRepository::class)]
class Avis
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $utilisteur_id = null;

    #[ORM\Column]
    private ?int $jeux_id = null;

    #[ORM\Column]
    private ?int $note = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $moderation = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?jeux $jeux = null;

    #[ORM\ManyToOne(inversedBy: 'avis')]
    private ?utilisateur $utilisateur = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUtilisteurId(): ?int
    {
        return $this->utilisteur_id;
    }

    public function setUtilisteurId(int $utilisteur_id): self
    {
        $this->utilisteur_id = $utilisteur_id;

        return $this;
    }

    public function getJeuxId(): ?int
    {
        return $this->jeux_id;
    }

    public function setJeuxId(int $jeux_id): self
    {
        $this->jeux_id = $jeux_id;

        return $this;
    }

    public function getNote(): ?int
    {
        return $this->note;
    }

    public function setNote(int $note): self
    {
        $this->note = $note;

        return $this;
    }

    public function getModeration(): ?string
    {
        return $this->moderation;
    }

    public function setModeration(string $moderation): self
    {
        $this->moderation = $moderation;

        return $this;
    }

    public function getJeux(): ?jeux
    {
        return $this->jeux;
    }

    public function setJeux(?jeux $jeux): self
    {
        $this->jeux = $jeux;

        return $this;
    }

    public function getUtilisateur(): ?utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }
}
