<?php

namespace App\Entity;

use App\Repository\PlaceRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;


#[ORM\Entity(repositoryClass: PlaceRepository::class)]
class Place
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $place = null;

    #[ORM\Column(length: 255)]
    private ?string $country = null;

    #[ORM\OneToMany(targetEntity: OriginalText::class, mappedBy: 'place')]
    private Collection $originalTexts;

    public function __construct()
    {
        $this->originalTexts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPlace(): ?string
    {
        return $this->place;
    }

    public function setPlace(string $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): static
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return Collection<int, OriginalText>
     */
    public function getOriginalTexts(): Collection
    {
        return $this->originalTexts;
    }

    /**
* @param OriginalText $text
*
* @return self
*/
public function addOriginalText(OriginalText $text) : static
{
if (!$this->originalTexts->contains($text)) {
$this->originalTexts->add($text);
}

return $this;
}

/**
* @param OriginalText $text
*
* @return self
*/
public function removeOriginalText(OriginalText $text) : static
{
$this->originalTexts->removeElement($text);

return $this;
}
}
