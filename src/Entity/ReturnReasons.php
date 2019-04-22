<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReturnReasons
 *
 * @ORM\Table(name="return_reasons", uniqueConstraints={@ORM\UniqueConstraint(name="idreturn_reasons_UNIQUE", columns={"idreturn_reasons"})})
 * @ORM\Entity
 */
class ReturnReasons
{
    /**
     * @var int
     *
     * @ORM\Column(name="idreturn_reasons", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idreturnReasons;

    /**
     * @var string|null
     *
     * @ORM\Column(name="return_reason_name", type="string", length=45, nullable=true)
     */
    private $returnReasonName;


}
