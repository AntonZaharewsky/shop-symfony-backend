<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Places
 *
 * @ORM\Table(name="Places", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_Places_adresses1_idx", columns={"adresses_id"}), @ORM\Index(name="fk_Places_place_types1_idx", columns={"place_types_id"})})
 * @ORM\Entity
 */
class Places
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $id;

    /**
     * @var string|null
     *
     * @ORM\Column(name="place_name", type="string", length=45, nullable=true)
     */
    private $placeName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="small_description", type="string", length=45, nullable=true)
     */
    private $smallDescription;

    /**
     * @var string|null
     *
     * @ORM\Column(name="description", type="string", length=45, nullable=true)
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="adresses_id", type="integer", nullable=false)
     */
    private $adressId;

    /**
     * @var int
     *
     * @ORM\Column(name="place_types_id", type="integer", nullable=false)
     */
    private $placeTypesId;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string")
     */
    private $image;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getPlaceName(): ?string
    {
        return $this->placeName;
    }

    /**
     * @param string|null $placeName
     */
    public function setPlaceName(?string $placeName): void
    {
        $this->placeName = $placeName;
    }

    /**
     * @return string|null
     */
    public function getSmallDescription(): ?string
    {
        return $this->smallDescription;
    }

    /**
     * @param string|null $smallDescription
     */
    public function setSmallDescription(?string $smallDescription): void
    {
        $this->smallDescription = $smallDescription;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getAdressId(): int
    {
        return $this->adressId;
    }

    /**
     * @param int $adressId
     */
    public function setAdressId(int $adressId): void
    {
        $this->adressId = $adressId;
    }

    /**
     * @return int
     */
    public function getPlaceTypes(): int
    {
        return $this->placeTypesId;
    }

    /**
     * @param int $placeTypesId
     */
    public function setPlaceTypes(int $placeTypesId): void
    {
        $this->placeTypesId = $placeTypesId;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setImage(string $image)
    {
        $this->image = $image;
    }
}
