<?php

namespace App\Entity;

use App\Repository\RankRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RankRepository::class)
 */
class Rank
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
    private $grade;

    /**
     * @ORM\Column(type="integer")
     */
    private $number;

    /**
     * @ORM\OneToMany(targetEntity=Profils::class, mappedBy="rank")
     */
    private $profils;

    public function __construct()
    {
        $this->profils = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGrade(): ?string
    {
        return $this->grade;
    }

    public function setGrade(string $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getNumber(): ?int
    {
        return $this->number;
    }

    public function setNumber(int $number): self
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return Collection|Profils[]
     */
    public function getProfils(): Collection
    {
        return $this->profils;
    }

    public function addProfil(Profils $profil): self
    {
        if (!$this->profils->contains($profil)) {
            $this->profils[] = $profil;
            $profil->setRank($this);
        }

        return $this;
    }

    public function removeProfil(Profils $profil): self
    {
        if ($this->profils->contains($profil)) {
            $this->profils->removeElement($profil);
            // set the owning side to null (unless already changed)
            if ($profil->getRank() === $this) {
                $profil->setRank(null);
            }
        }

        return $this;
    }
}
