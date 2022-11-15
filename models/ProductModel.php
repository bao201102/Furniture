<?php
class ProductModel
{

    public function __contruct()
    {
    }

    public function getProductList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product JOIN tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.status = 1 AND tbl_category.status = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductListLatest()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product JOIN tbl_category WHERE tbl_product.category_id = tbl_category.category_id AND tbl_product.status = 1 AND tbl_category.status = 1 ORDER BY tbl_product.prod_id DESC LIMIT 5");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProduct($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductId()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT prod_id FROM tbl_product WHERE prod_image_id is NULL");
        $data = $result[0]['prod_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategoryId($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT category_id FROM tbl_product WHERE prod_id = '$id'");
        $data = $result[0]['category_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getImageId($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT prod_image_id FROM tbl_product WHERE prod_id = '$id'");
        $data = $result[0]['prod_image_id'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addProduct($name, $quantity, $price, $cate_id, $description)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_product (prod_name, prod_quantity, prod_price, category_id, prod_description, STATUS) 
                                                    VALUES ('$name', '$quantity', '$price', '$cate_id', '$description', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function editProduct($id, $prod_name, $prod_quantity, $category_id, $prod_price, $prod_description)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_product SET prod_name = '$prod_name', prod_quantity = '$prod_quantity', category_id = '$category_id',
                                                                        prod_price = '$prod_price'  , prod_description = '$prod_description' WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteProduct($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_product SET STATUS = b'0' WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function addImageIdProduct($id, $prod_image_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_product SET prod_image_id = '$prod_image_id' WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function getProductByPrice($price1, $price2)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_price BETWEEN '$price1' AND '$price2'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getProductByName($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function searchProduct($price1, $price2, $cateList, $name, $from)
    {
        $category = '(';
        foreach ($cateList as $key => $value) {
            if ($key == count($cateList) - 1) {
                $category .= $value . ')';
            } else {
                $category .= $value . ",";
            }
        }

        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%' AND category_id in $category AND prod_price BETWEEN '$price1' AND '$price2' LIMIT $from, 6");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function searchProductAdmin($name, $cateList, $from)
    {
        $category = '(';
        foreach ($cateList as $key => $value) {
            if ($key == count($cateList) - 1) {
                $category .= $value['category_id'] . ')';
            } else {
                $category .= $value['category_id'] . ",";
            }
        }
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%' AND category_id in $category LIMIT $from, 6");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countPageProductAdmin($name, $cateList)
    {
        $category = '(';
        foreach ($cateList as $key => $value) {
            if ($key == count($cateList) - 1) {
                $category .= $value['category_id'] . ')';
            } else {
                $category .= $value['category_id'] . ",";
            }
        }
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%' AND category_id in $category");
        $total = ceil($result[0]['count(*)'] / 6);
        giaiPhongBoNho($link, $result);
        return $total;
    }

    public function getProductByCategory($category)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_product WHERE STATUS = 1 AND category_id like $category");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countPage($price1, $price2, $cateList, $name)
    {
        $category = '(';
        foreach ($cateList as $key => $value) {
            if ($key == count($cateList) - 1) {
                $category .= $value . ')';
            } else {
                $category .= $value . ",";
            }
        }

        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_product WHERE STATUS = 1 AND prod_name LIKE '%$name%' AND category_id in $category AND prod_price BETWEEN '$price1' AND '$price2'");
        $total = ceil($result[0]['count(*)'] / 6);
        giaiPhongBoNho($link, $result);
        return $total;
    }

    public function getQuantity($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT prod_quantity FROM tbl_product WHERE prod_id = '$id'");
        $data = $result[0]['prod_quantity'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function reduceQuantity($id, $prod_quantity)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_product SET prod_quantity = '$prod_quantity' WHERE prod_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
