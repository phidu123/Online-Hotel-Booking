<?php 
require("../connection.php");
    if(isset($_POST['get_general'])){
        $sql = "SELECT * from `settings` where `id`=?";
        $value = [1];
        $result = select($sql, $value, "i");
        $data = mysqli_fetch_assoc($result);
        $json_data = json_encode($data);
        echo $json_data;

    }

    if(isset($_POST['up'])){
        $data = filteration($_POST);

        $sql = "UPDATE `settings` set `site_title`=?, `site_about`=? where `id`=?";
        $value = [$data['site_title'], $data['site_about'], 1];
        $result = update($sql, $value, "ssi");
        echo $result;
    }


    if(isset($_POST['up_shutdown'])){
        $data = ($_POST['up_shutdown'] == 0) ? 1 : 0;

        $sql = "UPDATE `settings` set `shut`=? where `id`=?";
        $value = [$data, 1];
        $result = update($sql, $value, "ii");
        echo $result;
    }



    if(isset($_POST['get_user'])){
        $sql = "SELECT * from `taikhoan` where `USERNAME`=?";
        $value = [1];
        $result = select($sql, $value, "i");
        $data = mysqli_fetch_assoc($result);
        $json_data = json_encode($data);
        echo $json_data;

    }
    if(isset($_POST['user_shutdown'])){
        $data = ($_POST['user_shutdown'] == 0) ? 1 : 0;
        $a = 0;
        $sql = "UPDATE `TAIKHOAN` set `isActivated`=? where `USERNAME`=? and `isAdmin`= '$a'";
        $value = [$data, 0];
        $result = update($sql, $value, "ii");
        echo $result;
    }
?>