<?php

namespace App\Entity;

use App\Repository\PageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Uid\UuidV6;

#[ORM\Entity(repositoryClass: PageRepository::class)]
class Page
{

    /**
     * @var UuidV6
     *
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     * @ORM\Column(name="uuid", type="uuid")
     */
    private UuidV6 $uuid;

    /**
     * @var string|null
     *
     * @ORM\Column(name="keywords", type="string", length=255, nullable=true)
     */
    private ?string $keywords = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=true)
     */
    private ?string $description = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="title", type="string", length=255, nullable=true)
     */
    private ?string $title = null;

    /**
     * @var string|null
     *
     * @ORM\Column(name="content", type = Types::TEXT, nullable=true)
     */
    private ?string $content = null;

    public function __construct()
    {
        $this->uuid = UuidV6::v6();
    }

    public function getId(): ?UuidV6
    {
        return $this->uuid;
    }

    public function getKeywords(): ?string
    {
        return $this->keywords;
    }

    public function setKeywords(string $keywords): static
    {
        $this->keywords = $keywords;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }
}
