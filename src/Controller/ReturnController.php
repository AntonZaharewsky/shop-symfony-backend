<?php


namespace App\Controller;

use App\Model\ReturnModel;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class ReturnController
{
    /**
     * @var ReturnModel
     */
    private $returnModel;

    public function __construct(ReturnModel $returnModel)
    {
        $this->returnModel = $returnModel;
    }

    /**
     * @Route("/return", methods={"POST"})
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function returnAction(Request $request)
    {
        $requestContent = json_decode($request->getContent(), true);
        $this->returnModel->createReturn($requestContent['orderId'], $requestContent['returnReasonId']);

        return new JsonResponse([]);
    }

    /**
     * @Route("/returnreasons", methods={"GET"})
     *
     * @return JsonResponse
     */
    public function returnReasonAction()
    {
        return new JsonResponse($this->returnModel->getReturnReasons());
    }
}