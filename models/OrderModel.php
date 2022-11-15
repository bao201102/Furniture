<?php
class OrderModel
{
    function __construct()
    {
    }

    public function addOrderHaveCus($cus_id, $firstname, $lastname, $address, $city, $phone, $email, $notes)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order (cus_id, firstname, lastname, address, city, phone, email, notes, status) 
                                                    VALUES ('$cus_id', '$firstname', '$lastname', '$address', '$city', '$phone', '$email', '$notes', b'0')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function addOrderNoCus($firstname, $lastname, $address, $city, $phone, $email, $notes)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order (firstname, lastname, address, city, phone, email, notes, status) 
                                                    VALUES ('$firstname', '$lastname', '$address', '$city', '$phone', '$email', '$notes', b'0')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderId()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT order_id FROM tbl_order WHERE order_id = ( SELECT COUNT(order_id) FROM tbl_order )");
        $data = $result;
        return $data;
    }

    public function getOrderById($order_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_order WHERE order_id = '$order_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function searchOrderAdmin($name, $from)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_order WHERE firstname LIKE '%$name%' limit $from, 6");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countPageOrderAdmin($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_order WHERE firstname LIKE '%$name%'");
        $total = ceil($result[0]['count(*)'] / 6);
        giaiPhongBoNho($link, $result);
        return $total;
    }

    public function approveOrder($order_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_order SET status = b'1' WHERE order_id = '$order_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
