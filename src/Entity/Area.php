<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AreaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups" ={"read:area"}}
 * )
 * @ORM\Entity(repositoryClass=AreaRepository::class)
 */
class Area
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:area"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:area"})
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Stop::class, mappedBy="area", orphanRemoval=true)
     * @Groups({"read:area"})
     */
    private Collection $stops;

    /**
     * @ORM\ManyToMany(targetEntity=Ad::class, mappedBy="areas")
     */
    private $ads;

    public function __construct()
    {
        $this->stops = new ArrayCollection();
        $this->ads = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection|Stop[]
     */
    public function getStops(): Collection
    {
        return $this->stops;
    }

    public function addStop(Stop $stop): self
    {
        if (!$this->stops->contains($stop)) {
            $this->stops[] = $stop;
            $stop->setArea($this);
        }

        return $this;
    }

    public function removeStop(Stop $stop): self
    {
        if ($this->stops->removeElement($stop)) {
            // set the owning side to null (unless already changed)
            if ($stop->getArea() === $this) {
                $stop->setArea(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Ad[]
     */
    public function getAds(): Collection
    {
        return $this->ads;
    }

    public function addAd(Ad $ad): self
    {
        if (!$this->ads->contains($ad)) {
            $this->ads[] = $ad;
            $ad->addArea($this);
        }

        return $this;
    }

    public function removeAd(Ad $ad): self
    {
        if ($this->ads->removeElement($ad)) {
            $ad->removeArea($this);
        }

        return $this;
    }
}
