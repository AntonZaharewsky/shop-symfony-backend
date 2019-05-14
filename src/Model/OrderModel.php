<?php

namespace App\Model;

use Doctrine\ORM\EntityManagerInterface;

class OrderModel
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function placeOrder($userId, $basket, $address, $paymentMethodId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("
            INSERT INTO orders (users_id, address_id, payment_method_id) 
            VALUES (:userId, :addressId, :paymentMethodId);
        ");
        $selectAddress = $connection->prepare("SELECT * FROM adresses WHERE 
            city = :city and street = :street and home_number = :home_number and podjezd_number = :entrance_number and flat_number = :flat_number;");
        $selectAddress->bindValue('city', $address['city']);
        $selectAddress->bindValue('street', $address['street']);
        $selectAddress->bindValue('home_number', $address['home_number']);
        $selectAddress->bindValue('entrance_number', $address['entrance_number']);
        $selectAddress->bindValue('flat_number', $address['flat_number']);
        $selectAddress->execute();
        $selectedAddress = $selectAddress->fetchAll();

        if (empty($selectedAddress)) {
            $insertAddress = $connection->prepare("
                INSERT INTO adresses (city, street, home_number, podjezd_number, flat_number)
                VALUES
                (:city, :street, :home_number, :entrance_number, :flat_number);
            ");

            $insertAddress->bindValue('city', $address['city']);
            $insertAddress->bindValue('street', $address['street']);
            $insertAddress->bindValue('home_number', $address['home_number']);
            $insertAddress->bindValue('entrance_number', $address['entrance_number']);
            $insertAddress->bindValue('flat_number', $address['flat_number']);
            $insertAddress->execute();

            $addressId = $connection->lastInsertId();
        } else {
            $addressId = $selectedAddress[0]['id'];
        }

        $statement->bindValue('userId', $userId);
        $statement->bindValue('addressId', $addressId);
        $statement->bindValue('paymentMethodId', $paymentMethodId);
        $statement->execute();

        $orderId = $connection->lastInsertId();

        foreach ($basket as $productId => $product) {
            $this->placeOrderLine($productId, $product['quantity'], $orderId);
        }
    }

    private function placeOrderLine($productId, $quantity, $orderId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL PlaceOrderLine(:productId, :quantity, :orderId);");

        $statement->bindValue('productId', $productId);
        $statement->bindValue('quantity', $quantity);
        $statement->bindValue('orderId', $orderId);
        $statement->execute();
    }

    public function getOrders()
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL OrderSummary();");
        $statement->execute();

        return $statement->fetchAll();
    }

    public function deliveryOrder($orderId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL updateOrderDelivery(:delivery, :orderId);");

        $statement->bindValue('delivery', 1);
        $statement->bindValue('orderId', $orderId);
        $statement->execute();
    }

    public function rollBackDeliveryOrder($orderId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL updateOrderDelivery(:delivery, :orderId);");

        $statement->bindValue('delivery', 0);
        $statement->bindValue('orderId', $orderId);
        $statement->execute();
    }

    public function getOrderLines($orderId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL GetOrderLines(:orderId);");
        $statement->bindValue('orderId', $orderId);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getOrderHistory($orderId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL GetOrderHistory(:orderId);");
        $statement->bindValue('orderId', $orderId);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getByUserId($userId)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL ProfileOrderSummary(:userId);");
        $statement->bindValue('userId', $userId);
        $statement->execute();

        return $statement->fetchAll();
    }
}