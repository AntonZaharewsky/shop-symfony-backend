<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class SqlController
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
     * @Route("/admin/sql", methods={"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     * @throws \Doctrine\DBAL\DBALException
     */
    public function sqlAction(Request $request)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->executeQuery(json_decode($request->getContent(), true)['sql']);

        return new JsonResponse($statement->fetchAll());
    }
}