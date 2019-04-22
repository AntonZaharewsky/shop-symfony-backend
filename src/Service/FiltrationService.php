<?php

namespace App\Service;


use App\Entity\PlaceTypes;
use App\Model\PlaceModel;
use App\Model\ProductModel;

class FiltrationService
{
    /**
     * @var PlaceModel
     */
    private $placeModel;

    /**
     * @var ProductModel
     */
    private $productModel;

    public function __construct(PlaceModel $placeModel, ProductModel $productModel)
    {
        $this->placeModel = $placeModel;
        $this->productModel = $productModel;
    }

    public function filterByPlaceType(PlaceTypes $placeType)
    {
        return $this->placeModel->getByPlaceType($placeType);
    }

    public function filterProductsByMenuId(int $id)
    {
        return $this->productModel->getByMenuId($id);
    }
}