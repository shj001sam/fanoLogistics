<?php

namespace App\Entity;

use App\Repository\VtcRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VtcRepository::class)
 */
class Vtc
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
    private $banner_img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $banner_title;

    /**
     * @ORM\Column(type="text")
     */
    private $banner_text;

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

    public function getBannerImg(): ?string
    {
        return $this->banner_img;
    }

    public function setBannerImg(string $banner_img): self
    {
        $this->banner_img = $banner_img;

        return $this;
    }

    public function getBannerTitle(): ?string
    {
        return $this->banner_title;
    }

    public function setBannerTitle(string $banner_title): self
    {
        $this->banner_title = $banner_title;

        return $this;
    }

    public function getBannerText(): ?string
    {
        return $this->banner_text;
    }

    public function setBannerText(string $banner_text): self
    {
        $this->banner_text = $banner_text;

        return $this;
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
