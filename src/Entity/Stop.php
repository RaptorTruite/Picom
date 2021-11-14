<?php

namespace App\Entity;

use Symfony\Component\Serializer\Annotation\Groups;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StopRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource(
 *      normalizationContext={"groups" ={"read:stop"}}
 * )
 * @ORM\Entity(repositoryClass=StopRepository::class)
 */
class Stop
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"read:stop"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"read:stop"})
     */
    private $name;

    /**
     * @ORM\ManyToOne(targetEntity=area::class, inversedBy="stops")
     * @ORM\JoinColumn(nullable=false)
     */
    private $area;

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

    public function getArea(): ?area
    {
        return $this->area;
    }

    public function setArea(?area $area): self
    {
        $this->area = $area;

        return $this;
    }
}
