<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PaymentMethods
 *
 * @ORM\Table(name="payment_methods")
 * @ORM\Entity
 */
class PaymentMethods
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
     * @ORM\Column(name="payment_method_name", type="string", length=45, nullable=true)
     */
    private $paymentMethodName;


}
