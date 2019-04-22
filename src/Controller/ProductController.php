<?php

namespace App\Controller;


use App\Model\ProductModel;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ProductController
{
    /**
     * @var ProductModel
     */
    private $productModel;

    public function __construct(ProductModel $productModel)
    {
        $this->productModel = $productModel;
    }

    /**
     * @Route("/product", methods={"GET"})
     * @Template()
     */
    public function productsAction(Request $request)
    {
        return [
            'products' => $this->productModel->getAll()
        ];
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
}