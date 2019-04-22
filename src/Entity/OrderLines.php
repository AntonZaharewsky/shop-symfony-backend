<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OrderLines
 *
 * @ORM\Table(name="order_lines", indexes={@ORM\Index(name="fk_order_details_products1_idx", columns={"products_id"})})
 * @ORM\Entity
 */
class OrderLines
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
     * @var \Products
     *
     * @ORM\ManyToOne(targetEntity="Products")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="products_id", referencedColumnName="id")
     * })
     */
    private $products;


}
