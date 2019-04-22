<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Adresses
 *
 * @ORM\Table(name="adresses", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_adresses_users1_idx", columns={"users_id"})})
 * @ORM\Entity
 */
class Adresses
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
     * @ORM\Column(name="city", type="string", length=45, nullable=true)
     */
    private $city;

    /**
     * @var string|null
     *
     * @ORM\Column(name="street", type="string", length=45, nullable=true)
     */
    private $street;

    /**
     * @var string|null
     *
     * @ORM\Column(name="home_number", type="string", length=45, nullable=true)
     */
    private $homeNumber;

    /**
     * @var string|null
     *
     * @ORM\Column(name="postcode", type="string", length=45, nullable=true)
     */
    private $postcode;

    /**
     * @var int|null
     *
     * @ORM\Column(name="podjezd_number", type="integer", nullable=true)
     */
    private $podjezdNumber;

    /**
     * @var \Users
     *
     * @ORM\ManyToOne(targetEntity="Users")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="users_id", referencedColumnName="id")
     * })
     */
    private $users;


}
