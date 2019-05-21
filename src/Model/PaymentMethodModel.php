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

    public function addPaymentMethod(string $paymentMethodName)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("INSERT INTO payment_methods (payment_method_name) VALUES (:paymentMethodName);");
        $statement->bindValue('paymentMethodName', $paymentMethodName);
        $statement->execute();
    }

    public function removeMethod(int $id)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("DELETE FROM payment_methods WHERE id = :id;");
        $statement->bindValue('id', $id);
        $statement->execute();
    }
}