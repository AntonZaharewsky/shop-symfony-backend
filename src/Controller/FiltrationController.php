<?php

namespace App\Controller;


use App\Model\PlaceTypeModel;
use App\Service\FiltrationService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Serializer\SerializerInterface;

class FiltrationController
{
    /**
     * @var FiltrationService
     */
    private $filtrationService;

    /**
     * @var PlaceTypeModel
     */
    private $placeTypeModel;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(FiltrationService $filtrationService, PlaceTypeModel $placeTypeModel, SerializerInterface $serializer)
    {
        $this->filtrationService = $filtrationService;
        $this->placeTypeModel = $placeTypeModel;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/place/placetype/{placeTypeId}")
     */
    public function placeTypeFilter(int $placeTypeId): JsonResponse
    {
        return new JsonResponse(
            $this->serializer->serialize(
                $this->filtrationService->filterByPlaceType($this->placeTypeModel->getById($placeTypeId)),
                'json'
            )
        );
    }

    /**
     * @Route("/product/menu/{menuId}")
     *
     * @param int $menuId
     */
    public function productsByMenu(int $menuId): JsonResponse
    {
        return new JsonResponse(
            $this->serializer->serialize(
                $this->filtrationService->filterProductsByMenuId($menuId),
                'json'
            )
        );
    }
}