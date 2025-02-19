<?php

namespace App\Controller;

use App\Model\OrderModel;
use App\Model\UserModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{

    /**
     * @var SerializerInterface
     */
    private $serializer;

    /**
     * @var UserModel
     */
    private $userModel;

    /**
     * @var OrderModel
     */
    private $orderModel;

    public function __construct(SerializerInterface $serializer, UserModel $userModel, OrderModel $orderModel)
    {
        $this->serializer = $serializer;
        $this->userModel = $userModel;
        $this->orderModel = $orderModel;
    }

    /**
     * @Route("/order", methods={"POST"})
     */
    public function orderAction(Request $request)
    {
        $orderInfo = json_decode($request->getContent(), true);
        $user = $this->userModel->getByEmail($orderInfo['email']);

        $basket = json_decode($orderInfo['basket'], true);
        $this->orderModel->placeOrder($user[0]['id'], $basket, $orderInfo, $orderInfo['selected_payment_method']);

        return new JsonResponse([]);
    }

    /**
     * @Route("/order", methods={"GET"})
     *
     * @param Request $request
     */
    public function getAction(Request $request)
    {
        return new JsonResponse($this->orderModel->getOrders());
    }

    /**
     * @Route("/admin/order/delivery/{id}", methods={"POST"})
     *
     * @param $id
     *
     * @return JsonResponse
     */
    public function deliveryAction($id) : JsonResponse
    {
        $this->orderModel->deliveryOrder($id);

        return new JsonResponse([]);
    }

    /**
     * @Route("/admin/order/delivery/{id}/rollback", methods={"POST"})
     *
     * @param $id
     * @return JsonResponse
     */
    public function rollbackDeliveryAction($id) : JsonResponse
    {
        $this->orderModel->rollBackDeliveryOrder($id);

        return new JsonResponse([]);
    }

    /**
     * @Route("/api/order/{orderId}/lines", methods={"GET"})
     *
     * @param $orderId
     * @return JsonResponse
     */
    public function orderLinesAction($orderId) : JsonResponse
    {
        return new JsonResponse($this->orderModel->getOrderLines($orderId));
    }


    /**
     * @Route("/order/{orderId}/history", methods={"GET"})
     *
     * @param $orderId
     * @return JsonResponse
     */
    public function orderHistoryAction($orderId) : JsonResponse
    {
        return new JsonResponse($this->orderModel->getOrderHistory($orderId));
    }

    /**
     * @Route("/profile/order/{userId}", methods={"GET"})
     *
     * @param $userId
     * @return JsonResponse
     */
    public function getByUserIdAction($userId) : JsonResponse
    {
        return new JsonResponse($this->orderModel->getByUserId($userId));
    }
}