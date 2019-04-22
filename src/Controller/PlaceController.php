<?php

namespace App\Controller;


use App\Entity\Places;
use App\Model\MenusModel;
use App\Model\PlaceModel;
use App\Model\ProductModel;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Serializer\SerializerInterface;

class PlaceController
{
    /**
     * @var PlaceModel
     */
    private $placeModel;

    /**
     * @var MenusModel
     */
    private $menusModel;

    /**
     * @var ProductModel
     */
    private $productModel;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(PlaceModel $placeModel, MenusModel $menusModel, ProductModel $productModel,
                                SerializerInterface $serializer)
    {
        $this->placeModel = $placeModel;
        $this->menusModel = $menusModel;
        $this->productModel = $productModel;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/api/place", methods={"GET"})
     */
    public function placesAction(Request $request)
    {
        return new JsonResponse($this->serializer->serialize($this->placeModel->getAll(), 'json'));
    }

    /**
     * @Route("/place/{id}", methods={"GET"})
     * @Template()
     *
     * @param Request $request
     * @param int $id
     *
     * @return JsonResponse
     */
    public function placeAction(Request $request, int $id): JsonResponse
    {
        return new JsonResponse($this->serializer->serialize($this->placeModel->getById($id), 'json'));
    }

    /**
     * @Route("/place/{id}/details", methods={"GET"})
     *
     * @param Request $request
     * @param int $id
     */
    public function placeDetailAction(Request $request, int $id)
    {
        return new JsonResponse([
            'menus' => $this->serializer->serialize($this->menusModel->getByPlaceId($id), 'json'),
            'products' => $this->placeModel->getPlaceDetails($id)
        ]);
    }

    /**
     * @Route("/admin/place", methods={"POST"})
     */
    public function postPlaceAction(Request $request)
    {
        $name = $request->get('name');
        $smallDescription = $request->request->get('smallDescription');
        $description = $request->request->get('description');
        $placeTypeId = $request->request->get('placeTypeId');
        $addressId = $request->request->get('addressId');

var_dump([
    'name' => $name,
    'smallDescription' => $smallDescription,
    'description' => $description,
    'placeTypeId' => $placeTypeId,
    'addressesId' => $addressId
]); die;
//        $this->placeModel->setPlace([
//            'name' => $name,
//            'smallDescription' => $smallDescription,
//            'description' => $description,
//            'placeTypeId' => $placeTypeId,
//            'addressesId' => $addressId
//        ]);

        return new JsonResponse([]);
    }
}