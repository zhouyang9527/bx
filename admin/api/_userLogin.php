<?php
    include_once '../../config.php';
    include_once '../../getData.php';

    $email = $_POST['email'];
    $password= $_POST['password'];
    $sql = "SELECT * From users u where u.email = '{$email}' and u.`password`='{$password}' and u.`status`= 'activated'";

    $result = getData($sql);
    // print_r($result);
    $response = ["code"=>0,"msg"=>"操作失败"];
    if($result){
        $response["code"] = 1;
        $response["msg"] = "操作成功";
        session_start();
        $_SESSION['isLogin'] =1;
        $_SESSION['id'] =$result[0]['id'];
        $_SESSION['avatar'] = $result[0]['avatar'];
        $_SESSION['nickname'] = $result[0]['nickname'];
    }
    header('content-type:application/json;charset=utf-8');
    echo json_encode($response);
?>