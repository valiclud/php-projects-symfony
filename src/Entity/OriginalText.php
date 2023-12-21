<?php

namespace App\Entity;

use App\Repository\OriginalTextRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

#[ORM\Entity(repositoryClass: OriginalTextRepository::class)]
class OriginalText
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $author = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(length: 255)]
    private ?string $text = null;

    #[ORM\Column(type: Types::BLOB, nullable: true)]
    private $text_img = null;

    #[ORM\Column(length: 255)]
    private ?string $century = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $insert_date = null;

    #[ORM\Column]
    private ?int $hits = null;

    #[ORM\ManyToOne(targetEntity: Place::class, inversedBy: 'originalTexts')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private Place $place;

    #[ORM\ManyToOne(targetEntity: OldLanguage::class, inversedBy: 'originalTexts')]
    #[ORM\JoinColumn(nullable: true, onDelete: 'SET NULL')]
    private OldLanguage $oldLanguage;

    #[ORM\OneToMany(targetEntity: TranslatedText::class, mappedBy: 'originalText')]
    private Collection $translatedTexts;

    public function __construct()
    {
        $this->translatedTexts = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $text): static
    {
        $this->text = $text;

        return $this;
    }

    public function getTextImg()
    {
        return $this->text_img;
    }

    public function setTextImg($text_img): static
    {
        $this->text_img = $text_img;

        return $this;
    }

    public function getCentury(): ?string
    {
        return $this->century;
    }

    public function setCentury(string $century): static
    {
        $this->century = $century;

        return $this;
    }

    public function getInsertDate(): ?\DateTimeInterface
    {
        return $this->insert_date;
    }

    public function setInsertDate(\DateTimeInterface $insert_date): static
    {
        $this->insert_date = $insert_date;

        return $this;
    }

    public function getHits(): ?int
    {
        return $this->hits;
    }

    public function setHits(int $hits): static
    {
        $this->hits = $hits;

        return $this;
    }

    public function getPlace(): ?Place
    {
        return $this->place;
    }

    public function setPlace(?Place $place): static
    {
        $this->place = $place;

        return $this;
    }

    public function getOldLanguage(): ?OldLanguage
    {
        return $this->oldLanguage;
    }

    public function setOldLanguage(?OldLanguage $oldLanguage): static
    {
        $this->oldLanguage = $oldLanguage;

        return $this;
    }
    /**
     * @return Collection<int, TranslatedText>
     */
    public function getTranslatedTexts(): Collection
    {
        return $this->translatedTexts;
    }

    /**
     * @param TranslatedText $text
     *
     * @return self
     */
    public function addTranslatedText(TranslatedText $text): static
    {
        if (!$this->translatedTexts->contains($text)) {
            $this->translatedTexts->add($text);
        }

        return $this;
    }

    /**
     * @param TranslatedText $text
     *
     * @return self
     */
    public function removeTranslatedText(TranslatedText $text): static
    {
        $this->translatedTexts->removeElement($text);

        return $this;
    }
}
