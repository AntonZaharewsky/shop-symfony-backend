<?php

namespace App\Model;


use App\Entity\PlaceTypes;
use Doctrine\ORM\EntityManagerInterface;

class PlaceTypeModel
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
     * @return PlaceTypes[]
     */
    public function getAll(): array
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\PlaceTypes p"
        )->execute();
    }

    /**
     * @param int $id
     *
     * @return PlaceTypes
     */
    public function getById(int $id): PlaceTypes
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\PlaceTypes p WHERE p.id = :id"
        )->setParameter('id', $id)->execute()[0];
    }

}