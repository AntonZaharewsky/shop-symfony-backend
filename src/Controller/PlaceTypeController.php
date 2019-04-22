<?php

namespace App\Controller;


use App\Model\PlaceTypeModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class PlaceTypeController
{
    /**
     * @var PlaceTypeModel
     */
    private $placeTypeModel;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(PlaceTypeModel $placeTypeModel, SerializerInterface $serializer)
    {
        $this->placeTypeModel = $placeTypeModel;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/placetype", methods={"GET"})
     */
    public function placesAction(Request $request)
    {
        return new JsonResponse($this->serializer->serialize($this->placeTypeModel->getAll(), 'json'));
    }
}