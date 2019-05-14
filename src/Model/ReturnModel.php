<?php

namespace App\Model;

use Doctrine\ORM\EntityManagerInterface;

class ReturnModel
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function createReturn($orderId, $returnReasonId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare(
            "INSERT INTO returns (returned_at, return_reasons_idreturn_reasons, orders_id)
                      VALUES (:returnedAt, :returnReasonId, :orderId);
        ");
        $statement->bindValue('returnedAt', (new \DateTime())->format('d-m-Y H:i:s'));
        $statement->bindValue('returnReasonId', $returnReasonId);
        $statement->bindValue('orderId', $orderId);
        $statement->execute();
    }

    public function getReturnReasons()
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM return_reasons");
        $statement->execute();

        return $statement->fetchAll();
    }
}