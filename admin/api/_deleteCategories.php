<?php
    include_once '../../config.php';
    include_once '../../getData.php';

    $ids = $_POST['ids'];
    // print_r($ids);
    $sql = "delete from categories where id in(" . implode(',' , $ids) . ")";
    $result = updateData($sql);
    $response = ["code"=>0,"msg" => "操作失败"];
    if($result){
        $response["code"] = 1;
        $response["msg"] = "操作成功";
    }
    header("content-type:application/json;charset:utf-8");
    echo json_encode($response);
?>