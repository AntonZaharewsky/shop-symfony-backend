<?php

namespace App\Controller;


use App\Model\ProductModel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class ProductController
{
    /**
     * @var ProductModel
     */
    private $productModel;

    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(ProductModel $productModel, SerializerInterface $serializer)
    {
        $this->productModel = $productModel;
        $this->serializer = $serializer;
    }

    /**
     * @Route("/product", methods={"GET"})
     */
    public function productsAction(Request $request)
    {
        return new JsonResponse($this->serializer->serialize($this->productModel->getAll(), 'json'));
    }

    /**
     * @Route("/product/{id}", methods={"GET"})
     * @Template()
     *
     * @param Request $request
     * @param int $id
     *
     * @return array
     */
    public function productAction(Request $request, int $id) : array
    {
        return [
            'product' => $this->productModel->getById($id)
        ];
    }

    /**
     * @Route("/admin/product", methods={"POST"})
     */
    public function postPlaceAction(Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);

        $result = $this->productModel->setProduct([
            'name' => $requestContent['name'],
            'description' => $requestContent['description'],
            'image' => $requestContent['image'],
            'cost' => $requestContent['cost'],
            'menuName' => $requestContent['menu_name'],
            'placeId' => $requestContent['placeId']
        ]);

        return new JsonResponse($result);
    }

    /**
     * @Route("/admin/product", methods={"PATCH"})
     *
     * @param Request $request
     */
    public function updateAction(Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);

        $this->productModel->updateProduct([
            'id' => $requestContent['id'],
            'name' => $requestContent['name'],
            'description' => $requestContent['description'],
            'image' => $requestContent['image'],
            'cost' => $requestContent['cost'],
            'menuName' => $requestContent['menu_name'],
            'placeName' => $requestContent['place_name']
        ]);

        return new JsonResponse([]);
    }

    /**
     * @Route("/admin/product/{id}", methods={"DELETE"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function deleteAction(Request $request, $id)
    {
        $this->productModel->deleteProduct($id);

        return new JsonResponse([]);
    }
}