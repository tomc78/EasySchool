<?php

namespace App\Entity;

use App\Repository\ExamsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ExamsRepository::class)
 */
class Exams
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=Profils::class, inversedBy="exams")
     */
    private $student_name;

    /**
     * @ORM\ManyToOne(targetEntity=Subject::class, inversedBy="exams")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Subject;

    public function __construct()
    {
        $this->student_name = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Profils[]
     */
    public function getStudentName(): Collection
    {
        return $this->student_name;
    }

    public function addStudentName(Profils $studentName): self
    {
        if (!$this->student_name->contains($studentName)) {
            $this->student_name[] = $studentName;
        }

        return $this;
    }

    public function removeStudentName(Profils $studentName): self
    {
        if ($this->student_name->contains($studentName)) {
            $this->student_name->removeElement($studentName);
        }

        return $this;
    }

    public function getSubject(): ?Subject
    {
        return $this->Subject;
    }

    public function setSubject(?Subject $Subject): self
    {
        $this->Subject = $Subject;

        return $this;
    }
}
