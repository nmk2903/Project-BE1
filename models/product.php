<?php
class Product extends Db
{
    public function getAllProducts()
    {
        //Viet cau truy van 
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name,protypes.type_name FROM products, manufactures,protypes WHERE products.manu_id = manufactures.manu_id AND products.type_id=protypes.type_id ORDER BY `id` ASC");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getProductById($id)
    {
        //Viet cau truy van
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name,protypes.type_name FROM products, manufactures,protypes WHERE products.manu_id = manufactures.manu_id AND products.type_id=protypes.type_id AND `id` = $id");
        //$sql->bind_param("i", $id);
        $sql->execute();
        $data = array();
        $data = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $data;
    }


    public function search($keyword, $page, $itemsPerPage)
    {
        //Viet cau truy van
        $first = (($page - 1) * $itemsPerPage);
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name FROM products, manufactures WHERE `name` LIKE ? AND products.manu_id = manufactures.manu_id  LIMIT $first,$itemsPerPage");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $data = array();
        $data = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function totalSearch($keyword)
    {
        //Viet cau truy van
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name FROM products, manufactures WHERE `name` LIKE ? AND products.manu_id = manufactures.manu_id");
        $keyword = "%$keyword%";
        $sql->bind_param("s", $keyword);
        $sql->execute();
        $data = array();
        $data = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $data;
    }

    public function getTopSelling()
    {
        //Viet cau truy van
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name FROM products, manufactures WHERE products.manu_id = manufactures.manu_id ORDER BY `sold` DESC LIMIT 0,20");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
    public function getProductByProtypes($category)
    {

        //Viet cau truy van
        $sql = self::$connection->prepare("SELECT products.*, protypes.type_name, manufactures.manu_name FROM products, protypes, manufactures WHERE `type_name` LIKE ? AND products.type_id = protypes.type_id AND products.manu_id = manufactures.manu_id");
        $category = "$category";
        $sql->bind_param("s", $category);
        $sql->execute();
        $data = array();
        $data = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $data;
    }
    public function getTopSellingProtype($category)
    {
        //Viet cau truy van
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name FROM products, manufactures, protypes WHERE `type_name` LIKE ? AND products.type_id = protypes.type_id AND products.manu_id = manufactures.manu_id ORDER BY `sold` DESC LIMIT 0,10");
        $category = "$category";
        $sql->bind_param("s", $category);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getTopRankSellingProtype($category, $first, $end)
    {
        //Viet cau truy van
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name FROM products, manufactures, protypes WHERE `type_name` LIKE ? AND products.type_id = protypes.type_id AND products.manu_id = manufactures.manu_id ORDER BY `sold` DESC LIMIT ?,?");
        $category = "$category";
        $sql->bind_param("sii", $category, $first, $end);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getStoreProducts($page, $itemsPerPage)
    {
        //Viet cau truy van
        $first = (($page - 1) * $itemsPerPage);
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name FROM products, manufactures, protypes WHERE products.type_id = protypes.type_id AND products.manu_id = manufactures.manu_id ORDER BY `sold` DESC LIMIT $first,$itemsPerPage");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getRelatedProducts($manu_id, $id)
    {
        $sql = self::$connection->prepare("SELECT products.*, manufactures.manu_name,protypes.type_name FROM products, manufactures,protypes WHERE products.manu_id = manufactures.manu_id AND products.type_id=protypes.type_id AND products.manu_id = $manu_id AND id != $id");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    public function getCategory()
    {
        //Viet cau truy van 
        $sql = self::$connection->prepare("SELECT * FROM protypes");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    // public function insertOrderDetails($id, $order_id, $price, $amount)
    // {
    //     $sql = self::$connection->prepare(
    //         " INSERT INTO order_details(`id`, `order_id`, `price`, `amount`)
    //      VALUES ( $id, $order_id, $price, $amount)"
    //     );
    //     $sql->get_result()->fetch_all(MYSQLI_ASSOC);
    //     $sql->execute();
    // }

    public function insertOrder($order_date, $fullname, $address, $phone, $note, $email, $zip_code)
    {
        $sql = self::$connection->prepare(
            "INSERT INTO `order`(`order_date`, `fullname`, `address`, `phone`, `note`, `email`, `zip_code`) 
        VALUES (?,? ,? ,? ,? ,? ,?)"
        );
        //var_dump("INSERT INTO `order`(`order_date`, `fullname`, `address`, `phone`, `note`, `email`, `zip_code`) 
        //VALUES ('$order_date','$fullname', '$address', '$phone', '$note', '$email', '$zip_code')");
        $sql->bind_param("sssssss", $order_date, $fullname, $address, $phone, $note, $email, $zip_code);
        $sql->execute();
        // lay order_id
        $sql = self::$connection->prepare("SELECT `order_id` FROM `order` ORDER BY `order_id` DESC LIMIT 1");
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }
}
