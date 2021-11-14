<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\Serializer\Annotation\Groups;
use App\Repository\AdRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AdRepository::class)
 * @ORM\InheritanceType("SINGLE_TABLE")
 * @ORM\DiscriminatorColumn(name="discr", type="string")
 * @ORM\DiscriminatorMap({"adHtml" = "AdHtml", "adPicture" = "AdPicture"})
 * @ApiResource(
 *      normalizationContext={"groups" = {"read:ad", "read:timezones", "read:area", "read:stop"}}
 * )
 */
abstract class Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:ad"})
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=TimeZone::class, inversedBy="ads")
     * @Groups({"read:ad"})
     */
    private Collection $timeZones;

    /**
     * @ORM\ManyToMany(targetEntity=Area::class, inversedBy="ads")
     * @Groups({"read:ad"})
     */
    private Collection $areas;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:ad"})
     */
    private $dateBegin;

    /**
     * @ORM\Column(type="date", nullable=true)
     * @Groups({"read:ad"})
     */
    private $dateEnd;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="ads")
     * @ORM\JoinColumn(nullable=false)
     * @Groups({"read:ad"})
     */
    private $user;

    public function __construct()
    {
        $this->timeZones = new ArrayCollection();
        $this->areas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|TimeZone[]
     */
    public function getTimeZones(): Collection
    {
        return $this->timeZones;
    }

    public function addTimeZone(TimeZone $timeZone): self
    {
        if (!$this->timeZones->contains($timeZone)) {
            $this->timeZones[] = $timeZone;
        }

        return $this;
    }

    public function removeTimeZone(TimeZone $timeZone): self
    {
        $this->timeZones->removeElement($timeZone);

        return $this;
    }

    /**
     * @return Collection|Area[]
     */
    public function getAreas(): Collection
    {
        return $this->areas;
    }

    public function addArea(Area $area): self
    {
        if (!$this->areas->contains($area)) {
            $this->areas[] = $area;
        }

        return $this;
    }

    public function removeArea(Area $area): self
    {
        $this->areas->removeElement($area);

        return $this;
    }

    public function getDateBegin(): ?\DateTimeInterface
    {
        return $this->dateBegin;
    }

    public function setDateBegin(?\DateTimeInterface $dateBegin): self
    {
        $this->dateBegin = $dateBegin;

        return $this;
    }

    public function getDateEnd(): ?\DateTimeInterface
    {
        return $this->dateEnd;
    }

    public function setDateEnd(?\DateTimeInterface $dateEnd): self
    {
        $this->dateEnd = $dateEnd;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
