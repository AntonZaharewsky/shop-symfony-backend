<?php

namespace App\Model;

use App\Entity\Places;
use App\Entity\Products;
use Doctrine\ORM\EntityManagerInterface;

class ProductModel
{
    /**
     * @var EntityManagerInterface
     */
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * @return Products[]
     */
    public function getAll(): array
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Products p"
        )->execute();
    }

    /**
     * @param int $id
     *
     * @return Products
     */
    public function getById(int $id): Products
    {
        return $this->entityManager->createQuery(
            "SELECT p FROM App\Entity\Places p WHERE p.id = :id"
        )->setParameter('id', $id)->execute()[0];
    }

    public function getByPlace(Places $places)
    {
        return $this->entityManager->createQuery(
            "SELECT p from App\Entity\Products p WHERE "
        );
    }

    public function getByMenuId($id)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM products WHERE menu_id = :id");

        $statement->bindValue('id', $id);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function setProduct(array $params)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("SELECT * FROM menus WHERE menu_name = :menuName;");
        $insertMenusAndPlaces = $connection->prepare("INSERT INTO menus_and_places (Places_id, menus_id) VALUES (:placeId, :menuId);");
        $insertMenu = $connection->prepare("INSERT INTO menus (menu_name) VALUES (:menuName)");

        $statement->bindValue('menuName', $params['menuName']);
        $statement->execute();
        $menu = $statement->fetchAll();

        if (empty($menu)) {
            $insertMenu->bindValue('menuName', $params['menuName']);
            $insertMenu->execute();
            $menuId = $connection->lastInsertId();

            $insertMenusAndPlaces->bindValue('placeId', (int)$params['placeId']);
            $insertMenusAndPlaces->bindValue('menuId', (int)$menuId);
            $insertMenusAndPlaces->execute();
            $menuAndPlaceId = $connection->lastInsertId();
        } else {
            $statement = $connection->prepare("SELECT * FROM menus_and_places WHERE menus_id = :menuId and Places_id = :placeId;");
            $statement->bindValue('menuId', (int)$menu[0]['id']);
            $statement->bindValue('placeId', (int)$params['placeId']);
            $statement->execute();
            $menuAndPlace = $statement->fetchAll();
            $menuId = $menu[0]['id'];

            if (empty($menuAndPlace)) {
                $insertMenusAndPlaces->bindValue('menuId', (int)$menu[0]['id']);
                $insertMenusAndPlaces->bindValue('placeId', (int)$params['placeId']);
                $insertMenusAndPlaces->execute();

                $menuAndPlaceId = $connection->lastInsertId();
            } else {
                $menuAndPlaceId = $menuAndPlace[0]['id'];
            }
        }

        $statement = $connection->prepare("CALL CreateProduct(:product_name, :description, :image, :cost, :menuId);");

        $statement->bindValue('product_name', $params['name']);
        $statement->bindValue('description', $params['description']);
        $statement->bindValue('image', $params['image']);
        $statement->bindValue('cost', $params['cost']);
        $statement->bindValue('menuId', $menuAndPlaceId);
        $statement->execute();

        return ['productId' => $connection->lastInsertId(), 'placeId' => $params['placeId'], 'menuId' => $menuId, 'menuAndPlaceId' => $menuAndPlaceId];
    }

    public function updateProduct(array $params)
    {
        $connection = $this->entityManager->getConnection();
        $insertMenusAndPlaces = $connection->prepare("INSERT INTO menus_and_places (Places_id, menus_id) VALUES (:placeId, :menuId);");
        $selectMenu = $connection->prepare("SELECT * FROM menus WHERE menu_name = :menuName;");
        $selectMenu->bindValue('menuName', $params['menuName']);
        $selectMenu->execute();
        $menu = $selectMenu->fetchAll()[0];
        $selectPlace = $connection->prepare("SELECT * FROM places WHERE place_name = :placeName;");
        $selectPlace->bindValue('placeName', $params['placeName']);
        $selectPlace->execute();
        $place = $selectPlace->fetchAll()[0];
        $selectMenuAndPlace = $connection->prepare("SELECT * FROM menus_and_places WHERE Places_id = :placeId and menus_id = :menuId;");
        $selectMenuAndPlace->bindValue('placeId', $place['id']);
        $selectMenuAndPlace->bindValue('menuId', $menu['id']);
        $selectMenuAndPlace->execute();
        $menuAndPlace = $selectMenuAndPlace->fetchAll();

        if (empty($menuAndPlace)) {
            $insertMenusAndPlaces->bindValue('placeId', $place['id']);
            $insertMenusAndPlaces->bindValue('menuId', $menu['id']);
            $insertMenusAndPlaces->execute();
            $menuAndPlaceId = $connection->lastInsertId();
        } else {
            $menuAndPlaceId = $menuAndPlace[0]['id'];
        }

        $statement = $connection->prepare("CALL UpdateProduct(:product_name, :description, :image, :cost, :menuId, :id);");

        $statement->bindValue('product_name', $params['name']);
        $statement->bindValue('description', $params['description']);
        $statement->bindValue('image', $params['image']);
        $statement->bindValue('cost', $params['cost']);
        $statement->bindValue('menuId', $menuAndPlaceId);
        $statement->bindValue('id', $params['id']);
        $statement->execute();
    }

    public function deleteProduct($id)
    {
        $connection = $this->entityManager->getConnection();
        $statement = $connection->prepare("CALL DeleteProduct(:id);");
        $statement->bindValue('id', $id);
        $statement->execute();
    }
}