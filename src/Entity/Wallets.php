<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Wallets
 *
 * @ORM\Table(name="wallets", uniqueConstraints={@ORM\UniqueConstraint(name="id_UNIQUE", columns={"id"})}, indexes={@ORM\Index(name="fk_wallets_payment_methods1_idx", columns={"payment_methods_id"}), @ORM\Index(name="fk_wallets_users1_idx", columns={"users_id"}), @ORM\Index(name="fk_wallets_payment1_idx", columns={"payment_id"})})
 * @ORM\Entity
 */
class Wallets
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
     * @var \Payment
     *
     * @ORM\ManyToOne(targetEntity="Payment")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_id", referencedColumnName="id")
     * })
     */
    private $payment;

    /**
     * @var \PaymentMethods
     *
     * @ORM\ManyToOne(targetEntity="PaymentMethods")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="payment_methods_id", referencedColumnName="id")
     * })
     */
    private $paymentMethods;

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
