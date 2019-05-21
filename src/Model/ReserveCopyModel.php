<?php

namespace App\Model;


use Doctrine\ORM\EntityManagerInterface;

class ReserveCopyModel
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function makeReserveCopy($fileName)
    {
        $connection = $this->entityManager->getConnection();

        $statement = $connection->prepare("mysqldump --column-statistics=0 mydb > :fileName");
        $statement->bindValue('fileName', $fileName);
        $statement->execute();
    }
}