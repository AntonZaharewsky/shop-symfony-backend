<?php

namespace App\Controller;

use App\Model\PaymentMethodModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PaymentMethodController
{
    private $paymentMethodModel;

    public function __construct(PaymentMethodModel $paymentMethodModel)
    {
        $this->paymentMethodModel = $paymentMethodModel;
    }

    /**
     * @Route("/paymentmethod", methods={"GET"})
     */
    public function getAction()
    {
        return new JsonResponse($this->paymentMethodModel->getAll());
    }
}