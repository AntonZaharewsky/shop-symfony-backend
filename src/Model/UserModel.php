<?php

namespace App\Model;

use Doctrine\ORM\EntityManagerInterface;

class UserModel
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @param string $email
     * @return mixed[]
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getByEmail(string $email)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM users WHERE email = :email");

        $statement->bindValue('email', $email);
        $statement->execute();

        return $statement->fetchAll();
    }
}