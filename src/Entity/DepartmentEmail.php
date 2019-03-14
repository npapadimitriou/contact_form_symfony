<?php

namespace App\Entity;

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
     * @ORM\Column(type="string", length=100, unique=true)
     */
    private $NameDepartment;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $Email;

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
}
