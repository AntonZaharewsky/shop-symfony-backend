<?php

namespace App\Controller;

use App\Model\PaymentMethodModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/paymentmethod", methods={"POST"})
     *
     * @return JsonResponse
     */
    public function postAction(Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);

        $this->paymentMethodModel->addPaymentMethod($requestContent['paymentMethodName']);

        return new JsonResponse([]);
    }

    /**
     * @Route("/paymentmethod/{id}", methods={"DELETE"})
     *
     * @param $id
     */
    public function removeAction($id)
    {
        $this->paymentMethodModel->removeMethod($id);

        return new JsonResponse([]);
    }
}