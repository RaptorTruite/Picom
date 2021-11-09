<?php

namespace App\Entity;

use App\Entity\Ad;
use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\AdPictureRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ApiResource()
 * @ORM\Entity(repositoryClass=AdPictureRepository::class)
 */
class AdPicture extends Ad
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    public function getId(): ?int
    {
        return $this->id;
    }
}
