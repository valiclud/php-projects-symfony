<?php

namespace App\Entity;

use App\Repository\PaginationRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: PaginationRepository::class)]
class Pagination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $controllerName = null;

    #[ORM\Column]
    private ?int $results = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getControllerName(): ?string
    {
        return $this->controllerName;
    }

    public function setControllerName(string $controllerName): static
    {
        $this->controllerName = $controllerName;

        return $this;
    }

    public function getResults(): ?int
    {
        return $this->results;
    }

    public function setResults(int $results): static
    {
        $this->results = $results;

        return $this;
    }
}
