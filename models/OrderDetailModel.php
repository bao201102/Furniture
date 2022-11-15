<?php
class OrderDetailModel
{
    function __construct()
    {
    }

    public function addOrderDetail($order_id, $prod_id, $quantity, $prod_price)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_order_detail (order_id, prod_id, quantity, prod_price, status) 
                                                    VALUES ('$order_id', '$prod_id', '$quantity', '$prod_price', b'0')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getOrderDetailsList($order_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_order_detail JOIN tbl_product ON tbl_order_detail.prod_id = tbl_product.prod_id WHERE tbl_order_detail.order_id = '$order_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }
}
