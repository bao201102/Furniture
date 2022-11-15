<?php
class EmployeeModel
{
    public function __contruct()
    {
    }

    public function getEmpList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_employee WHERE STATUS = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getEmployeeByUserId($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_employee JOIN tbl_user ON tbl_employee.user_id = tbl_user.user_id WHERE tbl_employee.user_id = '$user_id' AND tbl_employee.status = 1");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addEmployee($user_id, $firstname, $lastname, $birthday, $phone)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_employee (user_id, firstname, lastname, birthday, phone, status) VALUES ('$user_id','$firstname','$lastname', '$birthday', '$phone', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function editEmployee($user_id, $firstname, $lastname, $birthday, $phone)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_employee SET firstname = '$firstname', lastname = '$lastname', birthday = '$birthday', phone = '$phone' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteEmployee($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_employee SET status = b'0' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function searchEmployeeAdmin($name, $from)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_employee WHERE STATUS = 1 AND firstname LIKE '%$name%'limit $from, 6");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function countPageEmployeeAdmin($name)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT count(*) FROM tbl_employee WHERE STATUS = 1 AND firstname LIKE '%$name%'");
        $total = ceil($result[0]['count(*)'] / 6);
        giaiPhongBoNho($link, $result);
        return $total;
    }
}
