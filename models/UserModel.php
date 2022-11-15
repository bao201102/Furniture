<?php
class UserModel
{
    var $user_id;
    var $email;
    var $user_password;
    var $created_date;
    var $user_type;
    var $status;


    public function getId()
    {
        return $this->user_id;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getPassword()
    {
        return $this->user_password;
    }
    public function getCreateDate()
    {
        return $this->created_date;
    }
    public function getUserType()
    {
        return $this->user_type;
    }
    public function getStatus()
    {
        return $this->status;
    }

    public function __contruct($user_id, $email, $user_password, $created_date, $user_type, $status)
    {
        $this->user_id = $user_id;
        $this->email = $email;
        $this->user_password = $user_password;
        $this->created_date = $created_date;
        $this->user_type = $user_type;
        $this->status = $status;
    }

    public function getUserById($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT user_id FROM tbl_user WHERE user_id = '$user_id' AND status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getUserList()
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_user WHERE status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getUserId($email)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT user_id FROM tbl_user WHERE email = '$email' AND status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function getUser($email, $password)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanTraVeDL($link, "SELECT * FROM tbl_user WHERE email = '$email' AND user_password = '$password' AND status = '1'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        return $data;
    }

    public function addUser($email, $password, $user_type)
    {
        $link = null;
        taoKetNoi($link);
        $date = date('Y-m-d');
        $result = chayTruyVanKhongTraVeDL($link, "INSERT INTO tbl_user (email, user_password, created_date, user_type, status) VALUES ('$email', '$password', '$date', b'$user_type', '1')");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteUser($user_id)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_user SET status = b'0' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function editUser($user_id, $email, $password)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_user SET email = '$email', user_password = '$password' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function changeEmail($user_id, $email)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_user SET email = '$email' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }

    public function changePassword($user_id,  $password)
    {
        $link = null;
        taoKetNoi($link);
        $result = chayTruyVanKhongTraVeDL($link, "UPDATE tbl_user SET user_password = '$password' WHERE user_id = '$user_id'");
        $data = $result;
        giaiPhongBoNho($link, $result);
        if ($data) {
            return true;
        } else {
            return false;
        }
    }
}
