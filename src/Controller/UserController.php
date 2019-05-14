<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class UserController
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
     * @Route("/admin/user/{userId}/makeadmin", methods={"PATCH"})
     *
     * @param $userId
     * @return JsonResponse
     */
    public function makeAdminAction($userId): JsonResponse
    {
        $this->giveRole($userId, 'ADMIN');
        return new JsonResponse([]);
    }

    /**
     * @Route("/admin/user/{userId}/makeuser", methods={"PATCH"})
     *
     * @param $userId
     * @return JsonResponse
     */
    public function makeUserAction($userId): JsonResponse
    {
        $this->giveRole($userId, 'USER');
        return new JsonResponse([]);
    }

    /**
     * @param $userId
     * @param $role
     */
    private function giveRole($userId, $role)
    {
        $user = $this->entityManager->find(User::class, $userId);
        $user->setRoles($role);
        $this->entityManager->persist($user);
        $this->entityManager->flush();
    }

    /**
     * @Route("/admin/user", methods={"GET"})
     *
     * @return JsonResponse
     * @throws \Doctrine\DBAL\DBALException
     */
    public function getAction() : JsonResponse
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT id, email, role FROM users");
        $statement->execute();

        return new JsonResponse($statement->fetchAll());
    }
}