<?php

namespace App\Entity;

use App\Repository\OldLanguageRepository;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: OldLanguageRepository::class)]
class OldLanguage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(length: 255)]
    private ?string $period = null;

    #[ORM\OneToMany(targetEntity: OriginalText::class, mappedBy: 'oldLanguage')]
    private Collection $originalTexts;

    public function __construct()
    {
        $this->originalTexts = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLanguage(): ?string
    {
        return $this->language;
    }

    public function setLanguage(?string $language): static
    {
        $this->language = $language;

        return $this;
    }

    public function getPeriod(): ?string
    {
        return $this->period;
    }

    public function setPeriod(string $period): static
    {
        $this->period = $period;

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
    public function addOriginalText(OriginalText $text): static
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
    public function removeOriginalText(OriginalText $text): static
    {
        $this->originalTexts->removeElement($text);

        return $this;
    }
}
