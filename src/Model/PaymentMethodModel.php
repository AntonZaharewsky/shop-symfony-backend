<?php

namespace App\Model;

use Doctrine\ORM\EntityManagerInterface;

class PaymentMethodModel
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getAll()
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM payment_methods;");
        $statement->execute();

        return $statement->fetchAll();
    }
}