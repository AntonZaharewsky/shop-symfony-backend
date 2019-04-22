<?php

namespace App\Model;

use App\Entity\Places;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;

class ProductModel
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
     * @return Products[]
     */
    public function getAll(): array
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Products p"
        )->execute();
    }

    /**
     * @param int $id
     *
     * @return Products
     */
    public function getById(int $id): Products
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Places p WHERE p.id = :id"
        )->setParameter('id', $id)->execute()[0];
    }

    public function getByPlace(Places $places)
    {
        return $this->entityManager->createQuery(
            "SELECT p from App\Entity\Products p WHERE "
        );
    }

    public function getByMenuId($id)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM products WHERE menu_id = :id");

        $statement->bindValue('id', $id);
        $statement->execute();

        return $statement->fetchAll();
    }
}