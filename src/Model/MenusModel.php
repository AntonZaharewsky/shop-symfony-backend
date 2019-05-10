<?php

namespace App\Model;

use App\Entity\Menus;
use Doctrine\ORM\EntityManagerInterface;

class MenusModel
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
        return $this->entityManager->createQuery(
            "SELECT m FROM App\Entity\Menus m"
        )->execute();
    }

    /**
     * @param $id
     *
     * @return Menus
     */
    public function getById($id): Menus
    {
        return $this->entityManager->createQuery(
            "SELECT m FROM App\Entity\Menus m WHERE m.id = :id"
        )->setParameter('id', $id)->execute()[0];
    }

    /**
     * @param int $id
     *
     * @return Menus[]
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getByPlaceId(int $id): array
    {
        $menus = [];
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM menus_and_places WHERE Places_id = :id");
        $statement->bindValue('id', $id);
        $statement->execute();

        foreach ($statement->fetchAll() as $item) {
            $menus[] = $this->getById($item['menus_id']);
        }

        return $menus;
    }

    public function getByPlaceIdForDetails(int $id): array
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("select mp.id, menu_name from menus_and_places mp inner join menus m on mp.menus_id = m.id where Places_id = :id;");
        $statement->bindValue('id', $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getMenuAndPlace()
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM menus_and_places;");
        $statement->execute();

        return $statement->fetchAll();
    }
}