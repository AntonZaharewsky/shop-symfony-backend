<?php

namespace App\Controller;


use App\Model\MenusModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class MenuController
{
    /**
     * @var MenusModel
     */
    private $menusModel;

    /**
     * @var SerializerInterface
     */
    private $serialier;

    public function __construct(MenusModel $menusModel, SerializerInterface $serializer)
    {
        $this->menusModel = $menusModel;
        $this->serialier = $serializer;
    }

    /**
     * @Route("/place/{placeId}/menu", methods={"GET"})
     *
     * @param int $placeId
     * @return JsonResponse
     */
    public function getByPlaceId(int $placeId) : JsonResponse
    {
        return new JsonResponse($this->serialier->serialize(
            $this->menusModel->getByPlaceId($placeId),
            'json'
        ));
    }
}