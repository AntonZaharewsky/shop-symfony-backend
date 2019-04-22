<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Returns
 *
 * @ORM\Table(name="returns", indexes={@ORM\Index(name="fk_returns_orders1_idx", columns={"orders_id"}), @ORM\Index(name="fk_returns_return_reasons1_idx", columns={"return_reasons_idreturn_reasons"})})
 * @ORM\Entity
 */
class Returns
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
     * @var \DateTime|null
     *
     * @ORM\Column(name="returned_at", type="datetime", nullable=true)
     */
    private $returnedAt;

    /**
     * @var \Orders
     *
     * @ORM\ManyToOne(targetEntity="Orders")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="orders_id", referencedColumnName="id")
     * })
     */
    private $orders;

    /**
     * @var \ReturnReasons
     *
     * @ORM\ManyToOne(targetEntity="ReturnReasons")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="return_reasons_idreturn_reasons", referencedColumnName="idreturn_reasons")
     * })
     */
    private $returnReasonsreturnReasons;


}
