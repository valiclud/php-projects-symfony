<?php

namespace App\Entity;

use App\Repository\TranslatedTextRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TranslatedTextRepository::class)]
class TranslatedText
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $author = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $title = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $text = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $language = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $insert_date = null;

    #[ORM\Column(nullable: true)]
    private ?int $revision = null;

    #[ORM\ManyToOne(targetEntity: OriginalText::class, inversedBy: 'translatedTexts')]
    private OriginalText $originalText;


    #[ORM\Column]
    private ?int $originaltext_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuthor(): ?string
    {
        return $this->author;
    }

    public function setAuthor(?string $author): static
    {
        $this->author = $author;

        return $this;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(?string $text): static
    {
        $this->text = $text;

        return $this;
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

    public function getInsertDate(): ?\DateTimeInterface
    {
        return $this->insert_date;
    }

    public function setInsertDate(\DateTimeInterface $insert_date): static
    {
        $this->insert_date = $insert_date;

        return $this;
    }

    public function getRevision(): ?int
    {
        return $this->revision;
    }

    public function setRevision(?int $revision): static
    {
        $this->revision = $revision;

        return $this;
    }

    public function getOriginaltextId(): ?int
    {
        return $this->originaltext_id;
    }

    public function setOriginaltextId(int $originaltext_id): static
    {
        $this->originaltext_id = $originaltext_id;

        return $this;
    }

    public function getOriginalText(): ?OriginalText
    {
        return $this->originalText;
    }

    public function setPlace(?OriginalText $originalText): static
    {
        $this->originalText = $originalText;

        return $this;
    }
}
