<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\DepartmentEmailRepository")
 */
class DepartmentEmail
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $NameDepartment;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Email;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Usercredentials", mappedBy="department")
     */
    private $usercredentials;

    public function __construct()
    {
        $this->usercredentials = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameDepartment(): ?string
    {
        return $this->NameDepartment;
    }

    public function setNameDepartment(string $NameDepartment): self
    {
        $this->NameDepartment = $NameDepartment;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->Email;
    }

    public function setEmail(string $Email): self
    {
        $this->Email = $Email;

        return $this;
    }

    /**
     * @return Collection|Usercredentials[]
     */
    public function getUsercredentials(): Collection
    {
        return $this->usercredentials;
    }

    public function addUsercredential(Usercredentials $usercredential): self
    {
        if (!$this->usercredentials->contains($usercredential)) {
            $this->usercredentials[] = $usercredential;
            $usercredential->setDepartment($this);
        }

        return $this;
    }

    public function removeUsercredential(Usercredentials $usercredential): self
    {
        if ($this->usercredentials->contains($usercredential)) {
            $this->usercredentials->removeElement($usercredential);
            // set the owning side to null (unless already changed)
            if ($usercredential->getDepartment() === $this) {
                $usercredential->setDepartment(null);
            }
        }

        return $this;
    }
}
