<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlaceTypes
 *
 * @ORM\Table(name="place_types", uniqueConstraints={@ORM\UniqueConstraint(name="idplace_types_UNIQUE", columns={"id"})})
 * @ORM\Entity
 */
class PlaceTypes
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="place_type_name", type="string", length=45, nullable=true)
     */
    private $placeTypeName;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPlaceTypeName(): string
    {
        return $this->placeTypeName;
    }
}
