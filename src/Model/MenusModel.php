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
}