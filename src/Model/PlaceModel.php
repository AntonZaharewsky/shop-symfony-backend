<?php

namespace App\Model;

use App\Entity\Places;
use App\Entity\PlaceTypes;
use Doctrine\ORM\EntityManagerInterface;

class PlaceModel
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
     * @return Places[]
     */
    public function getAll() : array
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Places p"
        )->execute();
    }

    /**
     * @param $id
     *
     * @return Places
     */
    public function getById($id): Places
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Places p WHERE p.id = :id"
        )->setParameter('id', $id)->execute()[0];
    }

    /**
     * @param PlaceTypes $placeType
     *
     * @return Places[]
     */
    public function getByPlaceType(PlaceTypes $placeType)
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Places p WHERE p.placeTypesId = :id"
        )->setParameter('id', $placeType->getId())->execute();
    }

    /**
     * @param $id
     * @return mixed[]
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getPlaceDetails($id)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM products WHERE menu_id in (SELECT menus_id FROM menus_and_places WHERE Places_id = :id);");

        $statement->bindValue('id', $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function setPlace(array $params)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare(
            "INSERT INTO places (place_name, small_description, description, place_types_id, adresses_id)
                      VALUES (:place_name, :smallDescription, :description, :placeTypeId, :addressesId);"
        );

        $statement->bindValue('place_name', $params['name']);
        $statement->bindValue('smallDescription', $params['smallDescription']);
        $statement->bindValue('description', $params['description']);
        $statement->bindValue('placeTypeId', $params['placeTypeId']);
        $statement->bindValue('addressesId', $params['addressesId']);
        $statement->execute();

        return $statement->fetchAll();
    }
}