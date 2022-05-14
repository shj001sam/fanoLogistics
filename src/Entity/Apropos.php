<?php

namespace App\Entity;

use App\Repository\AproposRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AproposRepository::class)
 */
class Apropos
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_title;

    /**
     * @ORM\Column(type="text")
     */
    private $desc_text;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescImg(): ?string
    {
        return $this->desc_img;
    }

    public function setDescImg(string $desc_img): self
    {
        $this->desc_img = $desc_img;

        return $this;
    }

    public function getDescTitle(): ?string
    {
        return $this->desc_title;
    }

    public function setDescTitle(string $desc_title): self
    {
        $this->desc_title = $desc_title;

        return $this;
    }

    public function getDescText(): ?string
    {
        return $this->desc_text;
    }

    public function setDescText(string $desc_text): self
    {
        $this->desc_text = $desc_text;

        return $this;
    }
}
