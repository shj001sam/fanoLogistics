<?php

namespace App\Entity;

use App\Repository\AcceuilRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AcceuilRepository::class)
 */
class Acceuil
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
    private $desc_vtc_img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_vtc_title;

    /**
     * @ORM\Column(type="text")
     */
    private $desc_vtc_text;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_liv_img;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desc_liv_title;

    /**
     * @ORM\Column(type="text")
     */
    private $desc_liv_text;

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

    public function getDescVtcImg(): ?string
    {
        return $this->desc_vtc_img;
    }

    public function setDescVtcImg(string $desc_vtc_img): self
    {
        $this->desc_vtc_img = $desc_vtc_img;

        return $this;
    }

    public function getDescVtcTitle(): ?string
    {
        return $this->desc_vtc_title;
    }

    public function setDescVtcTitle(string $desc_vtc_title): self
    {
        $this->desc_vtc_title = $desc_vtc_title;

        return $this;
    }

    public function getDescVtcText(): ?string
    {
        return $this->desc_vtc_text;
    }

    public function setDescVtcText(string $desc_vtc_text): self
    {
        $this->desc_vtc_text = $desc_vtc_text;

        return $this;
    }

    public function getDescLivImg(): ?string
    {
        return $this->desc_liv_img;
    }

    public function setDescLivImg(string $desc_liv_img): self
    {
        $this->desc_liv_img = $desc_liv_img;

        return $this;
    }

    public function getDescLivTitle(): ?string
    {
        return $this->desc_liv_title;
    }

    public function setDescLivTitle(string $desc_liv_title): self
    {
        $this->desc_liv_title = $desc_liv_title;

        return $this;
    }

    public function getDescLivText(): ?string
    {
        return $this->desc_liv_text;
    }

    public function setDescLivText(string $desc_liv_text): self
    {
        $this->desc_liv_text = $desc_liv_text;

        return $this;
    }
}
