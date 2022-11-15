<?php
class CategoryModel
{
    public function __contruct()
    {
    }

    public function getCategoryList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_category WHERE status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategoryIdList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT category_id FROM tbl_category WHERE status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getCategory($id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_category WHERE category_id = '$id' AND status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }


    public function addCategory($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_category (category_name, status) VALUES ('$name','1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function searchCategoryAdmin($name, $from)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_category WHERE STATUS = 1 AND category_name LIKE '%$name%' limit $from, 6");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function editCategory($id, $category_name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_category SET category_name = '$category_name' WHERE category_id = '$id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function duplicateCategory($category_name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT category_name FROM tbl_category WHERE category_name like '$category_name'");
        $data = $result[0]['category_name'];
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function editStatusCategory($category_name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_category SET status = b'1' WHERE category_name like '$category_name'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteCategory($category_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_category SET status = b'0' WHERE category_id = '$category_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    // public function getCategoryId()
    // {
    //     $link = null;
    //     taoKetNoi($link);
    //     $result = chayTruyVanTraVeDL($link, "select category_id from tbl_category where ");
    //     $data = $result[0]['prod_id'];
    //     giaiPhongBoNho($link, $result);
    //     return $data;
    // }

    public function countProdPerCate($category_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT COUNT(category_id) AS 'count' FROM tbl_product WHERE category_id = '$category_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countPageCategoryAdmin($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_category WHERE STATUS = 1 AND category_name LIKE '%$name%'");
        $total = ceil($result[0]['count(*)'] / 6);
        giaiPhongBoNho($link, $result);
        return $total;
    }
}
